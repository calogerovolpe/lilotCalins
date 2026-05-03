<?php get_header(); ?>

<main>

  <!-- ========================== -->
  <!-- Section Hero  -->
  <!-- ========================== -->
  <section class="bg-white overflow-hidden py-10 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-8">
        <!-- Contenu Texte -->
        <div
          class="w-full lg:w-1/2 flex flex-col items-center lg:items-start text-center lg:text-left z-10">
          <span
            class="inline-block py-1.5 px-4 rounded-full bg-red-50 text-red-500 text-sm font-bold tracking-wide border border-red-200 mb-6">
            Urgence absolue
          </span>

          <h1
            class="text-5xl font-title sm:text-5xl md:text-6xl font-extrabold text-gray-900 leading-tight mb-4">
            Chaque minute compte <br class="hidden lg:block" />
            <span class="text-brand-blue text-4xl sm:text-4xl md:text-5xl mt-2 block">pour leur survie.</span>
          </h1>

          <p class="text-base sm:text-lg text-gray-600 mb-10 max-w-xl">
            Des milliers d'enfants dans les pays en développement attendent une hospitalisation
            urgente. Sans vous, ils n'ont aucune chance. Avec vous, l'espoir renaît.
          </p>

          <!-- Call To Action (Optimisé Mobile/PC) -->
          <div class="w-full sm:w-auto">
            <button
              class="w-full sm:w-auto text-lg md:text-xl font-bold py-4 px-8 bg-red-500 hover:bg-red-600 text-white rounded-full shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all focus:outline-none">
              Je sauve une vie aujourd'hui
            </button>
          </div>
        </div>

        <!-- Bloc Image -->
        <div class="w-full lg:w-1/2 relative">
          <!-- Élément décoratif derrière l'image (Visible uniquement sur PC) -->
          <div
            class="absolute inset-0 bg-red-50 rounded-3xl transform translate-x-4 translate-y-4 hidden sm:block"></div>
          <img
            class="relative w-full h-72 sm:h-96 lg:h-[500px] object-cover rounded-3xl shadow-lg"
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Gemini_Generated_Image_j2yrizj2yrizj2yr.webp"
            alt="Aider un enfant peut le sauver" />
        </div>
      </div>
    </div>
  </section>

  <!-- =========================== -->
  <!-- SECTION DONATION -->
  <!-- =========================== -->
  <section id="don" class="py-10 bg-brand-blue/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col lg:flex-row">
        <!-- Explication & Sensibilisation -->
        <div class="lg:w-5/12 bg-brand-blue p-10 lg:p-12 text-white flex flex-col justify-center">
          <h2 class="font-title text-3xl font-bold mb-4">Votre don est leur seul remède.</h2>
          <p class="text-brand-blue-100 text-lg mb-8 opacity-90">
            L'îlot Câlins finance en urgence les opérations chirurgicales, les traitements lourds
            et le matériel médical pour les enfants dont les familles n'ont pas les moyens.
          </p>
          <ul class="space-y-4 font-medium">
            <li class="flex items-center">
              <svg
                class="h-6 w-6 text-white mr-3 opacity-80"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M5 13l4 4L19 7" />
              </svg>
              <span class="opacity-90">Paiement 100% sécurisé</span>
            </li>
            <li class="flex items-center">
              <svg
                class="h-6 w-6 text-white mr-3 opacity-80"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M5 13l4 4L19 7" />
              </svg>
              <span class="opacity-90">Déductible des impôts à 75%</span>
            </li>
            <li class="flex items-center">
              <svg
                class="h-6 w-6 text-white mr-3 opacity-80"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M5 13l4 4L19 7" />
              </svg>
              <span class="opacity-90">Transparence totale sur l'utilisation</span>
            </li>
          </ul>
        </div>

        <!-- Formulaire de don -->
        <div class="lg:w-7/12 p-10 lg:p-12">
          <h3 class="font-title text-2xl font-bold text-gray-800 mb-6">
            Faites votre don aujourd'hui
          </h3>
          <!-- Toggle Don Unique / Mensuel -->
          <div class="flex bg-gray-100 p-1 rounded-xl mb-8 relative">
            <button
              id="tab-unique"
              class="flex-1 bg-white shadow-sm text-gray-900 font-bold py-3 rounded-lg text-sm sm:text-base transition focus:outline-none relative z-10">
              Don unique
            </button>
            <button
              id="tab-mensuel"
              class="flex-1 text-gray-500 hover:text-gray-800 font-semibold py-3 rounded-lg text-sm sm:text-base transition focus:outline-none relative z-10">
              Don mensuel
              <span
                class="hidden sm:inline-block absolute -top-3 right-4 bg-brand-blue text-white text-[10px] uppercase font-bold py-1 px-2 rounded-full">Plus d'impact</span>
            </button>
          </div>

          <!-- Grille des montants : Don Unique -->
          <div id="grid-unique" class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <button
              data-amount="20"
              class="donation-btn border-2 border-gray-200 text-gray-600 rounded-xl py-4 hover:border-brand-blue hover:text-brand-blue hover:bg-brand-blue/5 transition font-bold focus:outline-none">
              20 €
              <span class="block text-xs font-normal text-gray-400 mt-1">Soins basiques</span>
            </button>
            <button
              data-amount="50"
              class="donation-btn border-2 border-brand-red bg-brand-red/5 text-brand-red rounded-xl py-4 transition font-bold relative focus:outline-none">
              <div
                class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-brand-red text-white text-[10px] uppercase font-bold py-1 px-2 rounded-full whitespace-nowrap">
                Le plus choisi
              </div>
              50 €
              <span class="block text-xs font-normal text-brand-red/70 mt-1">1 nuit d'hôpital</span>
            </button>
            <button
              data-amount="100"
              class="donation-btn border-2 border-gray-200 text-gray-600 rounded-xl py-4 hover:border-brand-blue hover:text-brand-blue hover:bg-brand-blue/5 transition font-bold focus:outline-none">
              100 €
              <span class="block text-xs font-normal text-gray-400 mt-1">Kit chirurgical</span>
            </button>
            <button
              data-amount="250"
              class="donation-btn border-2 border-gray-200 text-gray-600 rounded-xl py-4 hover:border-brand-blue hover:text-brand-blue hover:bg-brand-blue/5 transition font-bold focus:outline-none">
              250 €
              <span class="block text-xs font-normal text-gray-400 mt-1">Sauve une vie</span>
            </button>
          </div>

          <!-- Grille des montants : Don Mensuel (Cachée par défaut) -->
          <div id="grid-mensuel" class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6 hidden">
            <button
              data-amount="10"
              class="donation-btn border-2 border-gray-200 text-gray-600 rounded-xl py-4 hover:border-brand-blue hover:text-brand-blue hover:bg-brand-blue/5 transition font-bold focus:outline-none">
              10 €
              <span class="block text-xs font-normal text-gray-400 mt-1">Matériel stérile</span>
            </button>
            <button
              data-amount="15"
              class="donation-btn border-2 border-brand-red bg-brand-red/5 text-brand-red rounded-xl py-4 transition font-bold relative focus:outline-none">
              <div
                class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-brand-red text-white text-[10px] uppercase font-bold py-1 px-2 rounded-full whitespace-nowrap">
                Impact régulier
              </div>
              15 €
              <span class="block text-xs font-normal text-brand-red/70 mt-1">Suivi médical</span>
            </button>
            <button
              data-amount="30"
              class="donation-btn border-2 border-gray-200 text-gray-600 rounded-xl py-4 hover:border-brand-blue hover:text-brand-blue hover:bg-brand-blue/5 transition font-bold focus:outline-none">
              30 €
              <span class="block text-xs font-normal text-gray-400 mt-1">Traitements</span>
            </button>
            <button
              data-amount="50"
              class="donation-btn border-2 border-gray-200 text-gray-600 rounded-xl py-4 hover:border-brand-blue hover:text-brand-blue hover:bg-brand-blue/5 transition font-bold focus:outline-none">
              50 €
              <span class="block text-xs font-normal text-gray-400 mt-1">Fonds d'urgence</span>
            </button>
          </div>

          <!-- Montant libre -->
          <div class="mb-8">
            <label for="custom-amount" class="block text-sm font-medium text-gray-700 mb-2">Ou saisissez un montant libre</label>
            <div class="relative rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="text-gray-500 sm:text-sm">€</span>
              </div>
              <input
                type="number"
                min="1"
                step="1"
                id="custom-amount"
                class="focus:ring-brand-blue focus:border-brand-blue block w-full pl-8 pr-12 py-3 sm:text-sm border-gray-300 rounded-xl bg-gray-50 border transition"
                placeholder="0" />
            </div>
          </div>

          <!-- Bouton de validation dynamique -->
          <button
            id="submit-btn"
            class="w-full bg-brand-red text-white font-bold text-lg py-4 rounded-xl hover:bg-brand-redHover transition shadow-lg transform hover:-translate-y-0.5">
            Valider mon don de 50 €
          </button>

          <!-- Texte de déduction fiscale dynamique -->
          <p
            id="tax-text"
            class="text-center text-sm text-gray-500 font-medium mt-4 bg-green-50 text-green-700 py-2 rounded-lg border border-green-100">
            Soit 12,50 € après déduction fiscale (France).
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- =========================== -->
  <!-- FIN DE SECTION DONATION -->
  <!-- =========================== -->
</main>

<?php get_footer(); ?>