<x-app-layout>
    <div class="container-fluid p-5" style="height: 75vh;">
        
        <!-- First Main Row (50% of container height) -->
        <div class="d-flex flex-column" style="height: 66%;">
            
            <!-- 3:1 Split in Upper Row -->
            <div class="d-flex flex-column" style="height: 75%;">
                <!-- Row with 1:2 columns -->
                <div class="d-flex flex-row h-100">
                    <!-- First column with image -->
                    <div class="col-4 d-flex align-items-center justify-content-center">
                        <img src="images/professors/no-image.jpg" alt="Image" class="img-fluid rounded-circle" style="object-fit: cover; width: 80%; height: 80%;">
                    </div>
                    <!-- Second column -->
                    <div class="col-8 d-flex mt-5">
                        <p> &emsp;Lorem ipsum odor amet, consectetuer adipiscing elit. Sit lectus ut enim praesent odio proin. Maecenas dapibus laoreet dui rutrum interdum dapibus. 
                            Phasellus ut viverra posuere bibendum metus maximus dignissim lectus. Est nunc class accumsan, dignissim fusce phasellus imperdiet ligula. 
                            Justo vehicula pharetra vivamus aenean sit a. Nulla dui rhoncus semper fringilla lobortis vestibulum praesent volutpat. Lacinia elit phasellus 
                            vivamus nec vel diam rutrum congue porta.</p>
                    </div>
                </div>
            </div>

            <!-- Second part of Upper Row Bottom (25% height) with 1:2 columns -->
            <div class="d-flex flex-row" style="height: 25%;">
                <div class="col-4 d-flex align-items-center justify-content-center">
                    <h1 class='fw-bold'>Sadok Ben Yahia</h1>
                </div>
                <div class="col-8 d-flex">
                    <p> &emsp;Lorem ipsum odor amet, consectetuer adipiscing elit. Sit lectus ut enim praesent odio proin.</p>
                </div>
            </div>
        </div>

        <!-- Second Main Row (50% of container height) -->
        <div class="bg-danger d-flex align-items-center justify-content-center text-white" style="height: 34%;">
            Lower Row (single element, full width)
        </div>

    </div>
</x-app-layout>
