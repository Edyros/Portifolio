document.addEventListener('alpine:init', () => {
    Alpine.data('projectModal', () => ({
        showModal: false,
        currentImageIndex: 0,
        project: {
            title: '',
            description: '',
            images: [],
            technologies: [],
            features: [],
            results: '',
            demoUrl: '',
            githubUrl: ''
        },

        openModal(projectData) {
            this.project = projectData;
            this.currentImageIndex = 0;
            this.showModal = true;
            document.body.style.overflow = 'hidden';
        },

        closeModal() {
            this.showModal = false;
            document.body.style.overflow = 'auto';
        },

        previousImage() {
            if (this.currentImageIndex > 0) {
                this.currentImageIndex--;
            } else {
                this.currentImageIndex = this.project.images.length - 1;
            }
        },

        nextImage() {
            if (this.currentImageIndex < this.project.images.length - 1) {
                this.currentImageIndex++;
            } else {
                this.currentImageIndex = 0;
            }
        }
    }));
}); 