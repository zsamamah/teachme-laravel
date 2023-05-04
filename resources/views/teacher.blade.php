@extends('layouts.template')

@section('title')
    Teacher Profile
@endsection

@section('content')
<!--==================================
=            User Profile            =
===================================-->
<section class="dashboard section">
  <!-- Container Start -->
  <div class="container">
    <!-- Row Start -->
    <div class="row">
      <div class="col-lg-4">
        <div class="sidebar">
          <!-- User Widget -->
          <div class="widget user-dashboard-profile">
            <!-- User Image -->
            <div class="profile-thumb">
              <img src="images/user/user.png" alt="" class="rounded-circle">
            </div>
            <!-- User Name -->
            <h5 class="text-center">Teacher - Samanta Doe</h5>
            <p><i class="fa-solid fa-location-dot"></i> Amman</p>
            <!-- <a href="user-profile.html" class="btn btn-main-sm">Edit Profile</a> -->
          </div>
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
            <tbody>
              <tr>
                <td class="product-details">
                  <h3 class="title">Order form Lorem Ipsum</h3>
                  <span class="add-id"><strong>Ad ID:</strong> ng3D5hAMHPajQrM</span>
                  <span><strong>Posted on: </strong><time>Jun 27, 2017</time> </span>
                  <span class="status active"><strong>Status</strong>Active</span>
                  <span class="location"><strong>Location</strong>Amman,Jordan</span>
                </td>
                <td class="product-category"><span class="categories">Online instructor</span></td>
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
              <tr>
                <td class="product-details">
                  <h3 class="title">Order form Lorem Ipsum</h3>
                  <span class="add-id"><strong>Ad ID:</strong> ng3D5hAMHPajQrM</span>
                  <span><strong>Posted on: </strong><time>Jun 27, 2017</time> </span>
                  <span class="status active"><strong>Status</strong>Active</span>
                  <span class="location"><strong>Location</strong>Amman,Jordan</span>
                </td>
                <td class="product-category"><span class="categories">Online instructor</span></td>
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
              <tr>
                <td class="product-details">
                  <h3 class="title">Order form Lorem Ipsum</h3>
                  <span class="add-id"><strong>Ad ID:</strong> ng3D5hAMHPajQrM</span>
                  <span><strong>Posted on: </strong><time>Jun 27, 2017</time> </span>
                  <span class="status active"><strong>Status</strong>Active</span>
                  <span class="location"><strong>Location</strong>Amman,Jordan</span>
                </td>
                <td class="product-category"><span class="categories">Online instructor</span></td>
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
              <tr>
                <td class="product-details">
                  <h3 class="title">Order form Lorem Ipsum</h3>
                  <span class="add-id"><strong>Ad ID:</strong> ng3D5hAMHPajQrM</span>
                  <span><strong>Posted on: </strong><time>Jun 27, 2017</time> </span>
                  <span class="status active"><strong>Status</strong>Active</span>
                  <span class="location"><strong>Location</strong>Amman,Jordan</span>
                </td>
                <td class="product-category"><span class="categories">Online instructor</span></td>
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