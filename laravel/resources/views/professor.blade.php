<x-app-layout>
    <div class="container-fluid p-5" style="height: 75vh;">
        <!-- First Main Row (66% of container height) -->
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
                        <p>&emsp;Lorem ipsum odor amet, consectetuer adipiscing elit. Sit lectus ut enim praesent odio proin. Maecenas dapibus laoreet dui rutrum interdum dapibus.
                            Phasellus ut viverra posuere bibendum metus maximus dignissim lectus. Est nunc class accumsan, dignissim fusce phasellus imperdiet ligula.
                            Justo vehicula pharetra vivamus aenean sit a. Nulla dui rhoncus semper fringilla lobortis vestibulum praesent volutpat. Lacinia elit phasellus
                            vivamus nec vel diam rutrum congue porta.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Second part of Upper Row Bottom (25% height) with 1:2 columns -->
            <div class="d-flex flex-row" style="height: 25%;">
                <div class="col-4 d-flex align-items-center justify-content-center">
                    <h1 class="fw-bold mb-0">Sadok Ben Yahia</h1>
                </div>
                <div class="col-8 align-items-center justify-content-around d-flex">
                    <h4 class="mb-0"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>2.6/5</h4>
                    <button type="button" class="btn btn-outline-secondary w-25">Contact Professor</button>
                </div>
            </div>
        </div>
        <!-- Row of Cards (34% of container height) -->
        <div class="d-flex align-items-center justify-content-center" style="height: 34%; overflow-y: hidden;">
            <!-- Card Container -->
            <div class="d-flex justify-content-around w-50" style="height: 100%;">
                <!-- Individual Card -->
                <a href='/course' class="card text-center text-decoration-none" style="flex: 1 1 auto; margin: 0 10px; width: 10vw; max-height: 100%;">
                    <img src="images/courses/no-image.jpg" alt="Card Image" class="img-fluid" style="object-fit: contain; max-height: 100px;">
                    <div class="card-body">
                      <p class="card-text">Mathematics 1</p>
                      <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></p>
                    </div>
                </a>
                <!-- Duplicate as needed -->
                <a href='/course' class="card text-center text-decoration-none" style="flex: 1 1 auto; margin: 0 10px; width: 10vw; max-height: 100%;">
                    <img src="images/courses/economics.jpg" alt="Card Image" class="img-fluid" style="object-fit: contain; max-height: 100px;">
                    <div class="card-body">
                      <p class="card-text">Economics</p>
                      <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i></p>
                    </div>
                </a>
                <!-- Duplicate as needed -->
                <a href='/course' class="card text-center text-decoration-none" style="flex: 1 1 auto; margin: 0 10px; width: 10vw; max-height: 100%;">
                    <img src="images/homepage/campus.jpg" alt="Card Image" class="img-fluid" style="object-fit: contain; max-height: 100px;">
                    <div class="card-body">
                      <p class="card-text">Data Management</p>
                      <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i></p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>