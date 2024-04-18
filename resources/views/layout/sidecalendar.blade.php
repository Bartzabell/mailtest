<div>
    <section class="bg-white body">

        <aside class="fixed top-0 right-0 z-50 flex h-screen pl-12 transition duration-1000 ease-in-out transform translate-x-full bg-white border-l-2 border-black" style="width: 45%;" id="rightSidebar">

            <!-- open right sidebar button -->

            <div onclick="openRightSidebar()" type="button"
            class="cursor-pointer -left-24 transition transform ease-in-out duration-500 flex border-2 border-black dark:border-[#0F172A] bg-[#ffffff] hover:bg-red-500 absolute top-32 py-2 pr-7 pl-2 rounded-md text-black">
            <svg class="w-16 h-14" xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                <path d="M96 32V64H48C21.5 64 0 85.5 0 112v48H448V112c0-26.5-21.5-48-48-48H352V32c0-17.7-14.3-32-32-32s-32 14.3-32 32V64H160V32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192H0V464c0 26.5 21.5 48 48 48H400c26.5 0 48-21.5 48-48V192z"/>
            </svg>
            </div>

            <!-- MAX RIGHT SIDEBAR-->
            <div type="button"
            class="right-max"
            id="rightMaxSidebar" style="height: 100%; right: 0; width: 100%; margin-top: 20px; cursor: pointer; z-index: 100;">
            <div class="">
                <div class="">
                    <h1 class="mt-20"></h1>
                    @include('calendar.index')
                </div>
            </div>
            </div>

            <!-- MINI RIGHT SIDEBAR-->
            <div type="button" class="">
            </div>

        </aside>

    </section>
</div>
<script>
    const rightSidebar = document.querySelector("#rightSidebar");
    const rightMaxSidebar = document.querySelector(".right-max");
    const rightMiniSidebar = document.querySelector(".right-mini");
    const rightMaxToolbar = document.querySelector(".right-max-toolbar");

    function closeRightSidebar() {
        rightSidebar.classList.add("translate-x-full");
        rightSidebar.classList.remove("translate-x-0");
        rightMaxSidebar.classList.add("hidden");
        rightMaxSidebar.classList.remove("flex");
        rightMiniSidebar.classList.add("flex");
        rightMiniSidebar.classList.remove("hidden");
        rightMaxToolbar.classList.add("translate-x-24", "scale-x-0");
        rightMaxToolbar.classList.remove("translate-x-0");
    }

    function openRightSidebar() {
        if (rightSidebar.classList.contains('translate-x-full')) {
            // max right sidebar
            rightSidebar.classList.remove("translate-x-full");
            rightSidebar.classList.add("translate-x-0");
            rightMaxSidebar.classList.remove("hidden");
            rightMaxSidebar.classList.add("flex");
            rightMiniSidebar.classList.remove("flex");
            rightMiniSidebar.classList.add("hidden");
            rightMaxToolbar.classList.add("translate-x-0");
            rightMaxToolbar.classList.remove("translate-x-24", "scale-x-0");
        } else {
            // mini right sidebar
            rightSidebar.classList.add("translate-x-full");
            rightSidebar.classList.remove("translate-x-0");
            rightMaxSidebar.classList.add("hidden");
            rightMaxSidebar.classList.remove("flex");
            rightMiniSidebar.classList.add("flex");
            rightMiniSidebar.classList.remove("hidden");
            rightMaxToolbar.classList.add("translate-x-24", "scale-x-0");
            rightMaxToolbar.classList.remove("translate-x-0");
        }
    }

    document.addEventListener('click', function(event) {
        const isClickInsideRightSidebar = rightSidebar.contains(event.target);
        if (!isClickInsideRightSidebar) {
            closeRightSidebar();
        }
    });
</script>
