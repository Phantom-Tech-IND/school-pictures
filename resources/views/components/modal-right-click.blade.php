<dialog id="disable-right-click-modal">
    <div>This is a modal</div>
    <button onclick="document.getElementById('disable-right-click-modal').close()">Close</button>
</dialog>

<script>
    document.addEventListener('contextmenu', event => {
        event.preventDefault();

        const modal = document.getElementById("disable-right-click-modal");

        modal.showModal();

        modal.addEventListener("click", e => {
            const dialogDimensions = modal.getBoundingClientRect();
            if (
                e.clientX < dialogDimensions.left ||
                e.clientX > dialogDimensions.right ||
                e.clientY < dialogDimensions.top ||
                e.clientY > dialogDimensions.bottom
            ) {
                modal.close();
            }
        });
    });
</script>
