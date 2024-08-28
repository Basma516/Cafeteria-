@extends('layouts.app')

@section('content')
<div class="unit-5 overlay" style="background-image: url('{{ asset('external/images/hero_2.jpg') }}');">
  <div class="container text-center">
    <h1 class="mb-0 text-white" style="font-size: 2.5rem;">Jobs by Category</h1>
    <p class="mb-0 unit-6 text-white">
      <a href="/" class="text-white">Home</a> 
      <span class="sep"> > </span> 
      <a href="#" class="text-white">Jobs</a> 
      <span class="sep"> > </span> Category
    </p>
  </div>
</div>

<div class="site-section bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
    
        <div class="job-listing">
          <h3 class="text-center">All Jobs in This Category</h3>
          <table class="table table-bordered mt-4 text-center">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">Logo</th>
                <th scope="col">Title</th>
                <th scope="col">Address</th>
                <th scope="col">Job Type</th>
                <th scope="col">Job Posted</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
           
              <tr>
                <td>1</td>
                <td><img src="https://via.placeholder.com/50" alt="Logo" class="rounded-circle"></td>
                <td>Ut incididunt voluptatem omnis non.</td>
                <td>34468 Murray Creek</td>
                <td>Fulltime</td>
                <td>1 hour ago</td>
                <td><button class="btn btn-apply">Apply</button></td>
              </tr>
              <tr>
                <td>2</td>
                <td><img src="https://via.placeholder.com/50" alt="Logo" class="rounded-circle"></td>
                <td>Cumque vero qui quo exercitationem quasi.</td>
                <td>3994 Elody Club Suite</td>
                <td>Fulltime</td>
                <td>1 hour ago</td>
                <td><button class="btn btn-apply">Apply</button></td>
              </tr>
              <tr>
                <td>3</td>
                <td><img src="https://via.placeholder.com/50" alt="Logo" class="rounded-circle"></td>
                <td>Iste accusamus ullam dolores soluta quo nulla.</td>
                <td>4773 Tianna Courts N.</td>
                <td>Fulltime</td>
                <td>1 hour ago</td>
                <td><button class="btn btn-apply">Apply</button></td>
              </tr>
            </tbody>
          </table>
        </div>

      
       
        
          </table>
        </div>

     
       
          </table>
        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
        </nav>

      </div>
    </div>
  </div>
</div>
@endsection
