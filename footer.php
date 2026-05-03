  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const openBtn = document.getElementById("open-bottom-menu");
      const closeBtn = document.getElementById("close-bottom-menu");
      const bottomSheet = document.getElementById("mobile-bottom-sheet");
      const overlay = document.getElementById("mobile-overlay");
      const menuContent = document.getElementById("mobile-menu-content");

      const closeMenu = () => {
        overlay.classList.add("opacity-0");
        menuContent.classList.add("translate-y-full");
        // Attendre la fin de l'animation de 300ms avant de cacher l'élément HTML
        setTimeout(() => bottomSheet.classList.add("hidden"), 300);
      };

      if (openBtn && closeBtn) {
        openBtn.addEventListener("click", () => {
          bottomSheet.classList.remove("hidden");
          // Utiliser requestAnimationFrame permet au navigateur de rendre le 'display: block' avant de démarrer l'animation
          requestAnimationFrame(() => {
            overlay.classList.remove("opacity-0");
            menuContent.classList.remove("translate-y-full");
          });
        });

        closeBtn.addEventListener("click", closeMenu);
        overlay.addEventListener("click", closeMenu); // Fermer si clic à l'extérieur
      }

      // --- Script de gestion des dons ---
      // État initial
      let isMonthly = false;
      let currentAmount = 50;

      // Éléments du DOM
      const tabUnique = document.getElementById("tab-unique");
      const tabMensuel = document.getElementById("tab-mensuel");
      const gridUnique = document.getElementById("grid-unique");
      const gridMensuel = document.getElementById("grid-mensuel");
      const customAmountInput = document.getElementById("custom-amount");
      const submitBtn = document.getElementById("submit-btn");
      const taxText = document.getElementById("tax-text");

      // Classes CSS pour les onglets
      const activeTabClasses = ["bg-white", "shadow-sm", "text-gray-900", "font-bold"];
      const inactiveTabClasses = ["text-gray-500", "hover:text-gray-800", "font-semibold"];

      // Formateur de monnaie
      const formatCurrency = (value) => {
        return new Intl.NumberFormat("fr-FR", {
          style: "currency",
          currency: "EUR",
        }).format(value);
      };

      // Mettre à jour l'interface utilisateur
      const updateUI = () => {
        // 1. Gestion des onglets et des grilles
        if (isMonthly) {
          tabUnique.classList.remove(...activeTabClasses);
          tabUnique.classList.add(...inactiveTabClasses);
          tabMensuel.classList.remove(...inactiveTabClasses);
          tabMensuel.classList.add(...activeTabClasses);

          gridUnique.classList.add("hidden");
          gridMensuel.classList.remove("hidden");
        } else {
          tabMensuel.classList.remove(...activeTabClasses);
          tabMensuel.classList.add(...inactiveTabClasses);
          tabUnique.classList.remove(...inactiveTabClasses);
          tabUnique.classList.add(...activeTabClasses);

          gridMensuel.classList.add("hidden");
          gridUnique.classList.remove("hidden");
        }

        // 2. Mise en évidence du bouton de montant sélectionné
        const activeGrid = isMonthly ? gridMensuel : gridUnique;
        const buttons = activeGrid.querySelectorAll(".donation-btn");

        buttons.forEach((btn) => {
          const btnAmount = parseInt(btn.getAttribute("data-amount"));

          // Si le montant correspond ET que l'input personnalisé est vide
          if (btnAmount === currentAmount && customAmountInput.value === "") {
            btn.classList.add("border-brand-red", "bg-brand-red/5", "text-brand-red");
            btn.classList.remove("border-gray-200", "text-gray-600");
          } else {
            btn.classList.remove("border-brand-red", "bg-brand-red/5", "text-brand-red");
            btn.classList.add("border-gray-200", "text-gray-600");
          }
        });

        // 3. Calculs et mise à jour des textes
        const periodSuffix = isMonthly ? " / mois" : "";

        if (currentAmount > 0) {
          const costAfterDeduction = currentAmount * 0.25; // 75% de déduction = coût réel de 25%
          submitBtn.textContent = `Valider mon don de ${formatCurrency(currentAmount).replace(",00", "")}${periodSuffix}`;
          taxText.innerHTML = `🌟 Votre don ne vous coûte en réalité que <strong>${formatCurrency(costAfterDeduction)}${periodSuffix}</strong> après déduction fiscale de 75%.`;
        } else {
          submitBtn.textContent = `Saisissez un montant`;
          taxText.innerHTML = `Saisissez un montant pour estimer votre réduction d'impôts.`;
        }
      };

      // Événements : Clics sur les onglets
      tabUnique.addEventListener("click", () => {
        isMonthly = false;
        currentAmount = 50; // Montant par défaut pour le don unique
        customAmountInput.value = "";
        updateUI();
      });

      tabMensuel.addEventListener("click", () => {
        isMonthly = true;
        currentAmount = 15; // Montant par défaut pour le don mensuel
        customAmountInput.value = "";
        updateUI();
      });

      // Événements : Clics sur les boutons de montant
      const setupAmountButtons = (grid) => {
        const buttons = grid.querySelectorAll(".donation-btn");
        buttons.forEach((btn) => {
          btn.addEventListener("click", () => {
            currentAmount = parseInt(btn.getAttribute("data-amount"));
            customAmountInput.value = ""; // Réinitialiser le champ libre
            updateUI();
          });
        });
      };

      setupAmountButtons(gridUnique);
      setupAmountButtons(gridMensuel);

      // Événement : Saisie d'un montant libre
      customAmountInput.addEventListener("input", (e) => {
        const value = parseFloat(e.target.value);
        if (!isNaN(value) && value > 0) {
          currentAmount = value;
        } else {
          currentAmount = 0;
        }
        updateUI();
      });

      // Initialisation au chargement de la page
      updateUI();

      // ==========================================
      // CONNEXION AVEC WOOCOMMERCE
      // ==========================================

      // 1. On crée notre dictionnaire d'IDs WooCommerce
      // On associe chaque montant (clé) à l'ID du produit correspondant (valeur)
      const woocommerceProducts = {
        unique: {
          20: 40, // Remplacer 0 par l'ID réel quand tu l'auras créé
          50: 42,
          100: 43,
          250: 44,
        },
        mensuel: {
          10: 47, // Remplacer 0 par l'ID de l'abonnement 10€
          15: 49,
          30: 50,
          50: 48,
        },
      };

      // 2. On écoute le clic sur le gros bouton "Valider mon don"
      submitBtn.addEventListener("click", (e) => {
        e.preventDefault(); // Empêche la page de se recharger par défaut

        // Sécurité : on vérifie que le montant est valide
        if (currentAmount <= 0) {
          alert("Veuillez choisir ou saisir un montant valide.");
          return;
        }

        let productId = null;

        // On cherche l'ID correspondant dans notre dictionnaire
        if (isMonthly) {
          productId = woocommerceProducts.mensuel[currentAmount];
        } else {
          productId = woocommerceProducts.unique[currentAmount];
        }

        // 3. Redirection vers le Checkout WooCommerce
        if (productId && productId !== 0) {
          // Si on a trouvé un ID valide, on propulse le client vers le paiement
          window.location.href = `/?add-to-cart=${productId}`;
        } else {
          // Gestion du "Montant Libre" ou des IDs manquants
          // Comme tu as un champ input libre, si l'utilisateur tape "33€", il n'y aura pas d'ID fixe.
          alert(
            `Tu as choisi ${currentAmount}€. Il faut configurer le produit "Montant libre" pour cette valeur.`,
          );

          // Note : Pour le montant libre, tu devras soit utiliser un ID de produit spécifique "Montant libre"
          // et passer le prix dans l'URL (si ton plugin le permet), soit masquer l'input HTML si tu veux
          // obliger les gens à utiliser uniquement tes boutons fixes.
        }
      });
    });
  </script>

  <?php wp_footer(); ?>
  </body>

  </html>