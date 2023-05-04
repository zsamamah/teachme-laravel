@extends('layouts.template')

@section('title')
    Search
@endsection

@section('content')
<section class="dashboard section">
    <!-- Container Start -->
    <div class="container">
      <div class="advance-search">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-12 col-md-12 align-content-center">
                      <form>
                          <div class="form-row">
                              <div class="form-group col-xl-4 col-lg-3 col-md-6">
                                  <input type="text" class="form-control my-2 my-lg-1" id="inputtext4"
                                      placeholder="What are you looking for">
                              </div>
                              <div class="form-group col-lg-3 col-md-6">
                                  <select class="w-100 form-control mt-lg-1 mt-md-2">
                                      <option>Category</option>
                                      <option value="1">Top rated</option>
                                      <option value="2">Lowest Price</option>
                                      <option value="4">Highest Price</option>
                                  </select>
                              </div>
                              <div class="form-group col-lg-3 col-md-6">
                                  <input type="text" class="form-control my-2 my-lg-1" id="inputLocation4" placeholder="Location">
                              </div>
                              <div class="form-group col-xl-2 col-lg-3 col-md-6 align-self-center">
                                  <button type="submit" class="btn btn-primary active w-100">Search Now</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <!-- Row Start -->
      <div class="row">
        <div class="col-lg-4">
          <div class="sidebar">
              <!-- Map Widget -->
              <div class="widget map">
                  <div class="map">
                      <div id="map" data-latitude="31.8769389" data-longitude="35.9421834"></div>
                  </div>
              </div>
            <!-- Dashboard Links -->
            <div class="widget user-dashboard-menu">
              <ul>
                <li class="active"><a href="dashboard-my-ads.html"><i class="fa fa-user"></i> My Orders</a></li>
                <li><a href="dashboard-archived-ads.html"><i class="fa fa-file-archive-o"></i>Archived Ads
                    <span>12</span></a></li>
                <li><a href="dashboard-pending-ads.html"><i class="fa fa-bolt"></i> Pending Approval<span>23</span></a>
                </li>
                <li><a href="index.html"><i class="fa fa-power-off"></i> Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
  
  <!--==================================
  =            Table of Orders         =
  ===================================-->
  
        <div class="col-lg-8">
          <!-- Recently Favorited -->
          <div class="widget dashboard-container my-adslist">
            <h3 class="widget-header">My Ads</h3>
            <table class="table table-responsive product-dashboard-table">
              <thead>
                <tr>
                  <th>Order Title</th>
                  <th class="text-center">Category</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody id="table_body">
                
              </tbody>
            </table>
  
          </div>
  
        </div>
      </div>
      <!-- Row End -->
    </div>
    <!-- Container End -->
  </section>
@endsection

@section('scripts')
<script>
async function fetch_data(){
  const params = new URLSearchParams(window.location.search);
  const major = params.get('major');
  const category = params.get('category');
  const city = params.get('city');
  let x = await fetch(`http://127.0.0.1:8000/api/search_fetch?major=${major}`);
  let y = await x.json();
//   console.log(y)
  var data = []
  y.forEach(ele => {
      if(ele['city'] == city)
      data.unshift(ele)
      else
      data.push(ele)
    });
//   console.log(data)
var table = document.getElementById('table_body');
data.forEach(ele => {
    table.innerHTML +=`
    <tr>
                  <td class="product-details">
                    <h3 class="title">Teacher - ${ele['name']}</h3>
                    <span class="add-id"><strong>Ad ID:</strong> ${ele['id']}</span>
                    <span><strong>Joined on: </strong><time>${ele['created_at']?ele['created_at'].split('T')[0]:null}</time> </span>
                    <span class="status"><strong>Email: </strong>${ele['email']?ele['email']:null}</span>
                    <span class="location"><strong>Location</strong>${ele['city']?ele['city']:null}, Jordan</span>
                  </td>
                  <td class="product-category"><span class="categories">Math</span></td>
                  <td class="action" data-title="Action">
                    <div class="">
                      <ul class="list-inline justify-content-center">
                        <li class="list-inline-item">
                          <a class="edit" data-toggle="tooltip" data-placement="top" title="Accept" href="dashboard.html">
                            <i class="fa-solid fa-check"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a class="delete" data-toggle="tooltip" data-placement="top" title="Delete" href="dashboard.html">
                            <i class="fa fa-trash"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>
    `
});
}
fetch_data()
</script>
@endsection