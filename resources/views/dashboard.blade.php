@extends('back.layouts.master')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

     <!-- start page title -->
     <div class="row">
       <div class="col-12">
           <div class="page-title-box d-sm-flex align-items-center justify-content-between">
               <h4 class="mb-sm-0">Dashboard</h4>

               <div class="page-title-right">
                   <ol class="breadcrumb m-0">
                       <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                       <li class="breadcrumb-item active">Dashboard</li>
                   </ol>
               </div>

           </div>
       </div>
   </div>
   <!-- end page title -->

   <div class="row">
       <div class="col-xl-3 col-md-6">
           <div class="card">
               <div class="card-body">
                   <div class="d-flex">
                       <div class="flex-grow-1">
                           <p class="text-truncate font-size-14 mb-2">Active Links</p>
                           <h4 class="mb-2"> {{$activeLinksCount}} </h4>
                           <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from previous period</p>
                       </div>
                       <div class="avatar-sm">
                           <span class="avatar-title bg-light text-primary rounded-3">
                               <i class="ri-shopping-cart-2-line font-size-24"></i>  
                           </span>
                       </div>
                   </div>                                            
               </div><!-- end cardbody -->
           </div><!-- end card -->
       </div><!-- end col -->
       <div class="col-xl-3 col-md-6">
           <div class="card">
               <div class="card-body">
                   <div class="d-flex">
                       <div class="flex-grow-1">
                           <p class="text-truncate font-size-14 mb-2">Inactive Links</p>
                           <h4 class="mb-2">{{$inactiveLinksCount}}</h4>
                           <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i class="ri-arrow-right-down-line me-1 align-middle"></i>1.09%</span>from previous period</p>
                       </div>
                       <div class="avatar-sm">
                           <span class="avatar-title bg-light text-success rounded-3">
                               <i class="mdi mdi-currency-usd font-size-24"></i>  
                           </span>
                       </div>
                   </div>                                              
               </div><!-- end cardbody -->
           </div><!-- end card -->
       </div><!-- end col -->
       <div class="col-xl-3 col-md-6">
           <div class="card">
               <div class="card-body">
                   <div class="d-flex">
                       <div class="flex-grow-1">
                           <p class="text-truncate font-size-14 mb-2">Active Category</p>
                           <h4 class="mb-2"> {{$activeCategoryCount}} </h4>
                           <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>16.2%</span>from previous period</p>
                       </div>
                       <div class="avatar-sm">
                           <span class="avatar-title bg-light text-primary rounded-3">
                               <i class="ri-user-3-line font-size-24"></i>  
                           </span>
                       </div>
                   </div>                                              
               </div><!-- end cardbody -->
           </div><!-- end card -->
       </div><!-- end col -->
       <div class="col-xl-3 col-md-6">
           <div class="card">
               <div class="card-body">
                   <div class="d-flex">
                       <div class="flex-grow-1">
                           <p class="text-truncate font-size-14 mb-2">Inactive Category</p>
                           <h4 class="mb-2"> {{$inactiveLinksCount}} </h4>
                           <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>11.7%</span>from previous period</p>
                       </div>
                       <div class="avatar-sm">
                           <span class="avatar-title bg-light text-success rounded-3">
                               <i class="mdi mdi-currency-btc font-size-24"></i>  
                           </span>
                       </div>
                   </div>                                              
               </div><!-- end cardbody -->
           </div><!-- end card -->
       </div><!-- end col -->
   </div><!-- end row -->

   <div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-4">Click Statistic</h4>

                <div class="row text-center">
                    <div class="col-4">
                        @if(auth()->user()->role == 'admin')
                        <h5 class="mb-0">{{$usersCount}}</h5>
                        <p class="text-muted text-truncate">All User</p>
                        @endif
                    </div>
                    <div class="col-4">
                        <h5 class="mb-0">{{ $activeLinksCount }}</h5>
                        <p class="text-muted text-truncate">Active Links</p>
                    </div>
                    <div class="col-4">
                        <h5 class="mb-0">{{ $activeCategoryCount }}</h5>
                        <p class="text-muted text-truncate">Active Category</p>
                    </div>
                </div>

                <canvas id="myChart" height="300"></canvas>
            </div>
        </div>
    </div> 
</div>  
   
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var userRole = @json(auth()->user()->role);   
    var chartData = {
        labels: ['Active Links', 'Categories'],
        datasets: [{
            label: '# of Votes',
            data: [{{ $activeLinksCount }}, {{ $activeCategoryCount }}],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    };

    if (userRole === 'admin') {
        chartData.labels.unshift('Users');   
        chartData.datasets[0].data.unshift({{ $usersCount }});  
        chartData.datasets[0].backgroundColor.unshift('rgba(255, 99, 132, 0.2)');
        chartData.datasets[0].borderColor.unshift('rgba(255, 99, 132, 1)');
    }

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


    
@endsection
