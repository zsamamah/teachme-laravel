@extends('layouts.template')

@section('title')
    Search
@endsection

@section('content')
<section class="dashboard section">
    <!-- Container Start -->
    <div class="container">
      <!-- Row Start -->
      <div class="row">
        <div class="col-lg-4">
          <div class="sidebar">
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
  var table = document.getElementById('table_body');
  let x = await fetch(`http://127.0.0.1:8000/api/search_fetch?major=${major}`);
  let y = await x.json();
  var data = []
  console.log(y.length)
    y.forEach(ele => {
      if(ele['city'] == city)
      data.push(ele)
      // data.unshift(ele)
      // else
      // data.push(ele)
});
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
                  <td class="product-category"><span class="categories">${ele['major']?ele['major']:null}</span></td>
                  <td class="action" data-title="Action">
                  <div class="">
                    <ul class="list-inline justify-content-center">
                      <li class="list-inline-item">
                        <a class="edit" data-toggle="tooltip" data-placement="top" title="Contact" href="/profile/${ele['id']}">
                          <i class="fa-regular fa-address-card"></i>
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