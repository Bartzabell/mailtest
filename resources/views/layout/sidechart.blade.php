<div>
    <section class="body bg-white">

        <aside class="fixed top-0 right-0 z-50 flex h-screen transition duration-1000 ease-in-out transform translate-x-full bg-white border-l-2 border-black" style="width: 40%" id="rightSidebar">

            <!-- open right sidebar button -->

            <div onclick="openRightSidebar()" type="button"
            class="cursor-pointer -left-24 transition transform ease-in-out duration-500 flex border-2 border-black dark:border-[#0F172A] bg-[#ffffff] hover:bg-red-500 absolute top-32 py-2 pr-4 pl-2 rounded-md text-black">
            <svg class="w-20 h-16" xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                <path d="M0 128C0 75 43 32 96 32H480c53 0 96 43 96 96V384c0 53-43 96-96 96H96c-53 0-96-43-96-96V128zm176 48v56c0 13.3 10.7 24 24 24h48c13.3 0 24-10.7 24-24V176c0-26.5-21.5-48-48-48s-48 21.5-48 48zm176-48c-26.5 0-48 21.5-48 48v56c0 13.3 10.7 24 24 24h48c13.3 0 24-10.7 24-24V176c0-26.5-21.5-48-48-48zM48 208v24c0 13.3 10.7 24 24 24h48c13.3 0 24-10.7 24-24V208c0-26.5-21.5-48-48-48s-48 21.5-48 48zM96 384c26.5 0 48-21.5 48-48V312c0-13.3-10.7-24-24-24H72c-13.3 0-24 10.7-24 24v24c0 26.5 21.5 48 48 48zm80-48c0 26.5 21.5 48 48 48s48-21.5 48-48V312c0-13.3-10.7-24-24-24H200c-13.3 0-24 10.7-24 24v24zm176 48c26.5 0 48-21.5 48-48V312c0-13.3-10.7-24-24-24H328c-13.3 0-24 10.7-24 24v24c0 26.5 21.5 48 48 48zm80-176v24c0 13.3 10.7 24 24 24h48c13.3 0 24-10.7 24-24V208c0-26.5-21.5-48-48-48s-48 21.5-48 48zm48 176c26.5 0 48-21.5 48-48V312c0-13.3-10.7-24-24-24H456c-13.3 0-24 10.7-24 24v24c0 26.5 21.5 48 48 48z"/>
            </svg>
            </div>

            <!-- MAX RIGHT SIDEBAR-->
            <div type="button"
            class="cursor-pointer right-max hidden text-black mt-20 flex-col space-y-2 w-full h-[calc(100vh)]"
            id="rightMaxSidebar">
            <div class="mt-1">
                <h1 class="pb-2 pl-52"><b>Patient's Tooth chart</b></h1>
                @include('layout.tooth-chart')
            </div>
            </div>

            <!-- MINI RIGHT SIDEBAR-->
            <div type="button" class="cursor-pointer right-mini mt-20 flex flex-col space-y-2 w-full h-[calc(100vh)]">
                <div class="mt-1">
                    <h1 class="pb-2 pl-52"><b>Patient's Tooth chart</b></h1>
                    @include('layout.tooth-chart')
                </div>
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
