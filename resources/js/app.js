// import './bootstrap';
// import Alpine from 'alpinejs';
// window.Alpine = Alpine;


// Kanban drag and drop functionality
document.addEventListener('alpine:init', () => {
    Alpine.data('dropZone', () => ({
        onDragStart(event) {
            event.target.classList.add('opacity-50');
            event.dataTransfer.effectAllowed = 'move';
            event.dataTransfer.setData('application/json', JSON.stringify({
                id: event.target.dataset.id,
                status: event.target.dataset.status
            }));
        },

        onDragOver(event) {
            event.preventDefault();
            event.dataTransfer.dropEffect = 'move';
            
            const column = event.target.closest('.kanban-column');
            if (column) {
                column.classList.add('bg-neutral-700/50');
            }
        },
        
        onDragEnd(event) {
            event.target.classList.remove('opacity-50');
            document.querySelectorAll('.kanban-column').forEach(column => {
                column.classList.remove('bg-neutral-700/50');
            });
        },
        
        onDrop(event) {
            const column = event.target.closest('.kanban-column');
            if (!column) return;
            
            column.classList.remove('bg-neutral-700/50');
            
            const data = JSON.parse(event.dataTransfer.getData('application/json'));
            const newStatus = column.dataset.status;
            
            if (data.status !== newStatus) {
                const livewireComponent = window.Livewire.find(
                    event.target.closest('[wire\\:id]').getAttribute('wire:id')
                );
                livewireComponent.call('updateApplicationStatus', data.id, newStatus);
            }
        }
    }));
});