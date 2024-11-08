<x-app-layout>
    <div class="container-fluid py-4" style="height: 77vh; padding-left: 8rem; padding-right: 8rem">
        <div class="row h-100">
            <!-- First Column (8/12 width) -->
            <div class="col-8 d-flex flex-column">
                <!-- Row 1 (flex-grow-4) -->
                <div class="flex-fill bg-danger p-3">
                    This is the picture
                </div>
                <!-- Row 2 (flex-grow-8) -->
                <div class="flex-fill bg-primary text-white p-3">
                    This is the description
                </div>
            </div>
    
            <!-- Second Column (4/12 width) -->
            <div class="col-4 d-flex flex-column">
                <!-- Row 1 (flex-grow-2) -->
                <div class="flex-fill bg-success text-white p-3">
                    <h2>This is the title</h2>
                    <h4>This is the subtitle</h4>
                </div>
                <!-- Row 2 (flex-grow-4) -->
                <div class="flex-fill bg-warning p-3">
                    This is the professor tab
                </div>
                <!-- Row 3 (flex-grow-6) -->
                <div class="flex-fill bg-info text-white p-3">
                    This is the stats
                </div>
            </div>
        </div>
    </div>    
</x-app-layout>