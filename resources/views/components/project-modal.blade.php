<!-- Project Modal Component -->
<div x-show="showModal" 
     class="fixed inset-0 z-50 overflow-y-auto"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0">
    
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" @click="showModal = false"></div>

        <!-- Modal panel -->
        <div class="relative inline-block w-full max-w-4xl px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-gray-900 rounded-lg shadow-xl sm:my-8 sm:align-middle sm:p-6"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100">
            
            <!-- Close button -->
            <div class="absolute top-0 right-0 pt-4 pr-4">
                <button @click="showModal = false" class="text-gray-400 hover:text-white focus:outline-none">
                    <span class="sr-only">Fechar</span>
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Content -->
            <div class="mt-3 sm:mt-0">
                <h3 class="text-2xl font-bold text-white" x-text="project.title"></h3>
                
                <!-- Image Carousel -->
                <div class="relative mt-6 aspect-video">
                    <template x-for="(image, index) in project.images" :key="index">
                        <img :src="image" 
                             :class="{'absolute': true, 'inset-0': true, 'w-full': true, 'h-full': true, 'object-cover': true, 'rounded-lg': true, 'hidden': currentImageIndex !== index}"
                             :alt="project.title">
                    </template>
                    
                    <!-- Navigation arrows -->
                    <button @click="previousImage" class="absolute left-0 z-10 p-2 -ml-4 transform -translate-y-1/2 bg-black bg-opacity-50 rounded-full top-1/2 hover:bg-opacity-75">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button @click="nextImage" class="absolute right-0 z-10 p-2 -mr-4 transform -translate-y-1/2 bg-black bg-opacity-50 rounded-full top-1/2 hover:bg-opacity-75">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                <!-- Project Details -->
                <div class="mt-6 space-y-4">
                    <div>
                        <h4 class="text-lg font-semibold text-indigo-400">Descrição</h4>
                        <p class="mt-2 text-gray-300" x-text="project.description"></p>
                    </div>

                    <!-- Technologies -->
                    <div>
                        <h4 class="text-lg font-semibold text-indigo-400">Tecnologias</h4>
                        <div class="flex flex-wrap gap-2 mt-2">
                            <template x-for="tech in project.technologies" :key="tech.name">
                                <span class="px-3 py-1 text-sm text-white bg-indigo-600 rounded-full" x-text="tech.name"></span>
                            </template>
                        </div>
                    </div>

                    <!-- Features -->
                    <div>
                        <h4 class="text-lg font-semibold text-indigo-400">Principais Funcionalidades</h4>
                        <ul class="mt-2 ml-6 space-y-2 text-gray-300 list-disc">
                            <template x-for="feature in project.features" :key="feature">
                                <li x-text="feature"></li>
                            </template>
                        </ul>
                    </div>

                    <!-- Results -->
                    <div>
                        <h4 class="text-lg font-semibold text-indigo-400">Resultados Alcançados</h4>
                        <p class="mt-2 text-gray-300" x-text="project.results"></p>
                    </div>

                    <!-- Links -->
                    <div class="flex gap-4 mt-6">
                        <template x-if="project.demoUrl">
                            <a :href="project.demoUrl" target="_blank" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Ver Demo
                            </a>
                        </template>
                        <template x-if="project.githubUrl">
                            <a :href="project.githubUrl" target="_blank" class="inline-flex items-center px-4 py-2 text-sm font-medium text-indigo-600 bg-white border border-indigo-600 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                </svg>
                                Ver Código
                            </a>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 