<x-app-layout>
    <div class="container-fluid py-4" style="height: 77vh; padding-left: 8rem; padding-right: 8rem">
        <div class="row h-100">
            
            <!-- First Column (4/12 width) -->
            <div class="col-4 d-flex flex-column">
                 <!-- Row 1 (flex-grow-2) -->
                 <div class="flex-fill bg-success text-white h-100">
                    <h2>This is the picture of the proffesor</h2>
                </div>
                <!-- Row 2 (flex-grow-4) -->
                <div class="flex-fill bg-warning h-20">
                    This is the name of the professor
                </div>
                <!-- Row 3 (flex-grow-6) -->
                <div class="flex-fill bg-info text-white h-20">
                    This is the stats of the professor
                </div>
            </div>
    
            <!-- Second Column (8/12 width) -->
            <div class="col-8 d-flex flex-column bg-danger">
                    This is the description
            </div>

        </div>
        
    </div>    
    <div class="container-fluid py-4" style="height: 35vh; padding-left: 8rem; padding-right: 8rem">
        <div class="row h-100">
            
            <div class="col-2 d-flex flex-column bg-success m-2">
                Course 1
            </div>

            <div class="col-2 d-flex flex-column bg-danger m-2">
                Course 2
            </div>

            <div class="col-2 d-flex flex-column bg-success m-2">
                Course 3
            </div>

            <div class="col-2 d-flex flex-column bg-danger m-2">
                Course 4
            </div>

        </div>
        
    </div>  
</x-app-layout>