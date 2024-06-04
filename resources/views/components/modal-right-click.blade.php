<dialog id="disable-right-click-modal"
    class="flex flex-col items-center max-w-lg p-6 shadow-xl justify-stretch rounded-xl">
    <div
        class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
        <svg class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
        </svg>
    </div>
    <p class="mt-2 text-center text-gray-600">Diese Funktion wurde für <b class="font-semibold">ArtLine Fotografie AG -Fotografin- Tanja Arnold deaktiviert.</b></p>

    <div class="mt-5 sm:mt-6">
        <button type="button" onclick="document.getElementById('disable-right-click-modal').close()"
            class="inline-flex justify-center w-full px-3 py-2 text-sm font-semibold text-white bg-red-600 rounded-md shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
            Ich verstehe</button>
    </div>
</dialog>

<style>
    #disable-right-click-modal {
        transition: opacity 300ms ease-out, transform 300ms ease-out;
        pointer-events: none;
        opacity: 0;
        transform: translateY(-20px) scale(0.9);
    }

    #disable-right-click-modal[open] {
        transition: opacity 300ms ease-out, transform 300ms ease-out;
        pointer-events: auto;
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    #disable-right-click-modal::backdrop {
        background-color: rgba(0, 0, 0, 0.5);
        opacity: 0;
        transition: opacity 300ms ease-out;
    }

    #disable-right-click-modal[open]::backdrop {
        opacity: 1;
    }
</style>

<script type="module">
    const modal = document.getElementById("disable-right-click-modal");

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

    document.addEventListener('contextmenu', event => {
        event.preventDefault();

        modal.showModal();
    });
</script>
