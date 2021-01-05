<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/assets/common/css/NavBarStyle.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <div class="wrapper">
      <nav id="sidebar">
        <div class="title">
			Marketplace
		</div>
		<div class="subtitle">
			Buyer
		</div>
		<ul class="list-items">
			<li><a href="{{route('buyer.home')}}"><i class="fas fa-home"></i>Home</a></li>
			<li><a href="{{route('buyer.createjob')}}"><i class="fas fa-mail-bulk"></i>Add New Job</a></li>
			<li><a href="{{route('buyer.joblist')}}"><i class="fas fa-list-ol"></i>Job List</a></li>
			<li><a href="{{route('buyer.createreview')}}"><i class="fas fa-mail-bulk"></i>Add New Review</a></li>
			<li><a href="{{route('buyer.reviewlist')}}"><i class="fas fa-list-ol"></i>Review List</a></li>
			<li><a href="{{route('buyer.freelancerlist')}}"><i class="fas fa-list-ol"></i>Freelancer List</a></li>
			<li><a href="{{route('buyer.billinglist')}}"><i class="fas fa-list-ol"></i>Billing List</a></li>
			<li><a href="{{route('buyer.financelist')}}"><i class="fas fa-list-ol"></i>Finance List</a></li>
			<li><a href="{{route('buyer.payment')}}"><i class="fas fa-list-ol"></i>Payment</a></li>
			<li><a href="{{route('buyer.companyplan')}}"><i class="fas fa-list-ol"></i>Company plan</a></li>
			<li><a href="{{route('buyer.buyerreport')}}"><i class="fas fa-file-pdf"></i>Report</a></li>
			<li><a href=""><i class="fas fa-file-pdf"></i>Profile</a></li>
			<li><a href="/logout"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
		</ul>
		</nav>
    </div>
</div>
</body>
</html>