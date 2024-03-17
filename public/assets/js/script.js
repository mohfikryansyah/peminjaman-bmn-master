        const sidebarBackdrop = document.getElementById("sidebarBackdrop");
        const toggleSidebarMobileHamburger = document.getElementById("toggleSidebarMobileHamburger");
        const toggleSidebarMobileClose = document.getElementById("toggleSidebarMobileClose");
        const sidebar = document.getElementById("sidebar");

        toggleSidebarMobileHamburger.addEventListener('click', function () {
            sidebarBackdrop.classList.toggle('hidden');
            toggleSidebarMobileClose.classList.toggle('hidden');
            toggleSidebarMobileHamburger.classList.toggle('hidden');
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('flex');
        });

        toggleSidebarMobileClose.addEventListener('click', function () {
            sidebarBackdrop.classList.toggle('hidden');
            toggleSidebarMobileClose.classList.toggle('hidden');
            toggleSidebarMobileHamburger.classList.toggle('hidden');
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('flex');
        });

        sidebarBackdrop.addEventListener('click', function () {
            sidebarBackdrop.classList.toggle('hidden');
            toggleSidebarMobileClose.classList.toggle('hidden');
            toggleSidebarMobileHamburger.classList.toggle('hidden');
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('flex');
        })