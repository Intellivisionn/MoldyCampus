<x-app-layout>
    <div class="container-fluid" style="box-sizing: border-box; padding: 5vw; height: 75vh;">
        <div class="row h-100">
          <!-- First Column (2/3 width) -->
          <div class="col-8 d-flex flex-column mx-0 px-0">
            <div class="position-relative" style="height: 33.33%; overflow: hidden;">
              <!-- Replace Element 1 content with the image -->
              <img src="images/homepage/campus.jpg" alt="Image" class="position-absolute w-100 h-100" style="object-fit: cover; top: 0; left: 0;">
            </div>
            <div class="d-flex justify-content-center flex-grow-1 mx-5 pt-5" style="flex-basis: 66.67%;">
                <p>
                    &emsp;Lorem ipsum odor amet, consectetuer adipiscing elit. Tempor litora pretium proin blandit turpis magna felis finibus imperdiet. 
                    Pulvinar risus elementum molestie quam aenean. Tristique dignissim leo molestie blandit urna nulla sociosqu mattis. Ipsum pulvinar 
                    nisi bibendum commodo leo consequat. Dictumst nisl at laoreet mi fringilla nibh orci ullamcorper.
                </p>
            </div>
          </div>
      
          <!-- Second Column (1/3 width) -->
          <div class="col-4 d-flex flex-column">
            <div class="d-flex justify-content-center flex-grow-1 flex-column" style="flex-basis: 16.67%; padding-left: 4vw;">
                <span class='fw-bold'><h1>Data Management</h2></span>
                <h5>SE304</h5>
            </div>
            <hr>
            <div class="d-flex align-items-center justify-content-center flex-grow-1 flex-column" style="flex-basis: 33.33%;">
                <!-- Title at the top -->
                <h3 class="mb-3">Professors</h3>
                
                <!-- Row of Cards -->
                <div class="d-flex flex-grow-1 justify-content-around">
                  <!-- Individual Card -->
                  <a href='/professor' class="card d-flex flex-column align-items-center text-center text-decoration-none" style="flex: 1 1 auto; margin: 0 10px;">
                    <img src="images/professors/no-image.jpg" alt="Card Image" 
                          class="img-fluid" 
                          style="flex-grow: 1; object-fit: contain; max-height: 150px;">
                    <div class="card-body">
                      <p class="card-text">Sadok Ben Yahia</p>
                    </div>
                  </a>
                  
                  <!-- Duplicate as needed -->
                  <a href='/professor' class="card d-flex flex-column align-items-center text-center text-decoration-none" style="flex: 1 1 auto; margin: 0 10px;">
                    <img src="images/professors/no-image.jpg" alt="Card Image" 
                          class="img-fluid" 
                          style="flex-grow: 1; object-fit: contain; max-height: 150px;">
                    <div class="card-body">
                      <p class="card-text">Sadok Ben Yahia</p>
                    </div>
                  </a>

                  <!-- Duplicate as needed -->
                  <a href='/professor' class="card d-flex flex-column align-items-center text-center text-decoration-none" style="flex: 1 1 auto; margin: 0 10px;">
                    <img src="images/professors/no-image.jpg" alt="Card Image" 
                          class="img-fluid" 
                          style="flex-grow: 1; object-fit: contain; max-height: 150px;">
                    <div class="card-body">
                      <p class="card-text mb-0">Sadok Ben Yahia</p>
                    </div>
                  </a>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-center flex-grow-1 mt-3" style="flex-basis: 35%;">
                <p>
                    Times taken: 800 <br> Rating: 2.3/5 <br> 5-star ratings: 13 <br> Course ranking: 135/170
                </p>
            </div>
            <hr>
            <div class="d-flex justify-content-center flex-grow-1 mt-3" style="flex-basis: 15%;">
                <button type="button" class="btn btn-outline-secondary w-100">Go to university page</button>
            </div>
          </div>
      
        </div>
      </div>      
</x-app-layout>