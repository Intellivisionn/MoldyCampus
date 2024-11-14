<div>
    <div class="container-fluid" style="box-sizing: border-box; padding: 5vw; height: 75vh;">
        <div class="row h-100">
          <!-- First Column (2/3 width) -->
          <div class="col-8 d-flex flex-column mx-0 px-0">
            <div class="position-relative" style="height: 33.33%; overflow: hidden;">
              <img src="{{ file_exists(asset('images/courses/' . $course->image_path))
              ? asset('images/courses/' . $course->image_path)
              : asset('images/courses/no-image.jpg') }}" 
              alt="Image" class="position-absolute w-100 h-100" style="object-fit: cover; top: 0; left: 0;">
            </div>
            <div class="d-flex justify-content-center flex-grow-1 mx-5 pt-3 " style="flex-basis: 33.33%;">
                <p>
                    &emsp;{{ $course->description }}
                </p>
            </div>
            <div class="d-flex justify-content-center flex-grow-1" style="flex-basis: 33.33%; max-height: 33.33%">
              <div class="d-flex justify-content-around w-100" style="height: 100%;">
                <!-- Individual Card -->
                @if(count($reviews) > 0)
                @foreach($reviews as $review)
                <div class="card text-center mx-3" style="flex: 1 1 auto; max-height: 100%;">
                  <div class="card-body">
                    <p class="card-text"> {{ $review['student_name'] }}&emsp; {{ $review['rating'] }}/5</p>
                    <p class="text-sm"> {{ $review['review'] }} </p>
                  </div>
                </div>
                @endforeach
                @else
                <h2>No Ratings</h2>
                @endif

              </div>
            </div>
          </div>
      
          <!-- Second Column (1/3 width) -->
          <div class="col-4 d-flex flex-column">
            <div class="d-flex justify-content-center flex-grow-1 flex-column" style="flex-basis: 16.67%; padding-left: 4vw;">
                <span class='fw-bold'><h1>{{ $course->name }}</h2></span>
                <h5>Course ID: {{ $course->code }}</h5>
            </div>
            <hr>
            <div class="d-flex align-items-center justify-content-center flex-grow-1 flex-column" style="flex-basis: 33.33%;">
                <!-- Title at the top -->
                <h3 class="mb-3">Professors</h3>
                
                <!-- Row of Cards -->
                <div class="d-flex flex-grow-1 justify-content-around">
                  <!-- Individual Card -->
                  @if(count($professors) > 0)
                  @foreach($professors as $professor)
                    <a href='/professor/{{$professor['id']}}' class="card d-flex flex-column align-items-start text-center text-decoration-none" style="flex: 1 1 auto; margin: 0 10px; max-width: 120px; max-height: 220px;">
                      <img src="{{public_path('images/professors/' . $professor['image_path'])}}) 
                                  ? asset('images/professors/' . $professor['image_path']) 
                                  : asset('images/professors/no-image.jpg') }}" 
                          alt="Card Image" 
                          class="img-fluid" 
                          style="object-fit: contain; max-height: 150px;">
                      <div class="card-body">
                          <p class="card-text"> {{$professor['name']}} </p>
                      </div>
                    </a>
                  @endforeach
                  @else
                    <h2>No Professors Specified</h2>
                  @endif

                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-center flex-grow-1 flex-column" style="flex-basis: 35%;">
              <div class="d-flex flex-grow-1 justify-content-between">
                @if(count($reviews) > 0)
                <h4 class="mb-3"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
                  {{$finalRating}} / 5
                </h4>
                <h4>#143</h4>
                
              </div>
              <div class="d-flex flex-grow-1 justify-content-center align-items-center flex-column">
                <p class="mb-0">Course material&emsp;<i class="fa fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i></p>
                <p class="mb-0">Interactivity&emsp;<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></p>
                <p class="mb-0">Use of technology&emsp;<i class="fa fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i></p>
              </div>
              @else
               <h2>No ratings</h2>
              @endif
              </p>
            </div>
            <hr>
            <div class="d-flex justify-content-center flex-grow-1" style="flex-basis: 15%;">
                <button type="button" class="btn btn-outline-secondary w-100">Go to university page</button>
            </div>
            
            @if(auth()->check())
            <div style="height: 10px"></div>
            <div class="d-flex justify-content-center flex-grow-1" style="flex-basis: 15%;">
              <button type="button" class="btn btn-outline-secondary w-100">Add review</button>
            </div>
            @endif

          </div>
      
        </div>
      </div>      
</div>