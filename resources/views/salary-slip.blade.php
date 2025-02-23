@extends('layouts.app')
@section('content')
@include('layouts.admin-sidebar')

<div class="page-wrapper">

				<!-- Page Content -->
                <div class="content container-fluid">

					<!-- Page Title -->
					<div class="row">
						<div class="col-sm-5 col-4">
							<h4 class="page-title">Payslip</h4>
						</div>
						<div class="col-sm-7 col-8 text-right m-b-30">
							<div class="btn-group btn-group-sm">
								<button class="btn btn-white">CSV</button>
								<button class="btn btn-white">PDF</button>
								<button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</button>
							</div>
						</div>
					</div>
					<!-- /Page Title -->

					<div class="row">
						<div class="col-md-10 offset-md-1">
						<style>
						h2{font-size:25px;}
						table tr td,table tr th{padding:0px 5px;}
							table tr td{font-family: 'Open Sans', sans-serif;font-size: 12px;color: #22262e;}
						</style>
							<div class="card-box">
							<table style="width:100%;border:1px solid #333;padding:20px;">
							<tr><td style="width:100%;">
							<table class="text-center" style="width:100%;">
							<tr><td style="width:25%;"> &nbsp;</td>
							<td style="width:50%;padding:10px;">
							<h2 class="text-center">Websbaba Technology Pvt Ltd</h2>
								<p class="text-center">Gurgaon, Haryana</p><br/>
								<h4 class="text-center">Payslip for the month of Feb 2019</h4>
								</td>
								<td style="width:25%;"><img src="assets/img/company-logo.png" style="width:150px;"></td>
								</tr>
							</table>

							</td></tr>

							<tr>
							<td style="vertical-align: top;">
							<table class="text-left" style="width:100%;">
							<tr>
							<td style="width:25%;"> Employee Id</td>
							<td style="width:25%;"> :02</td>
							<td style="width:25%;"> Name</td>
							<td style="width:25%;"> :Akhilesh Chaturvedi</td>
							</tr>
							<tr>
							<td style="width:25%;"> Department</td>
							<td style="width:25%;"> :Information Technology</td>
							<td style="width:25%;"> Designation</td>
							<td style="width:25%;"> :Supervisor</td>
							</tr>
							<tr>
							<td style="width:25%;"> Date Of Birth</td>
							<td style="width:25%;"> :22/06/2001</td>
							<td style="width:25%;"> PF Account Number </td>
							<td style="width:25%;"> :Esi/07</td>

							</tr>
							<tr>
							<td style="width:25%;"> Date Of Joining</td>
							<td style="width:25%;"> :06/06/2001</td>
							<td style="width:25%;"> ESI Account Number </td>
							<td style="width:25%;"> :CA07</td>
							</tr>
							<tr>
							<td style="width:25%;"> Total Days </td>
							<td style="width:25%;"> :31</td>
							<td style="width:25%;"> Work Days </td>
							<td style="width:25%;"> :31</td>

							</tr>
							</table>
							</td>
							</tr>


							<tr><td style="padding:0px;">

							<table class="text-left" border="1" style="width:100%;border-left:0px;border-right:0px;margin-top:5px;">

							<tr>
							<td style="width:50%;border-left:0px;padding:0px;vertical-align: top;">
							<table style="width:100%;">
							<tr style="border-bottom:1px solid #333;"><th>Earnings</th><th class="text-right">YID</th><th class="text-right">Amount</th></tr>
							<tr><td>Wages</td><td class="text-right">12,000.00</td><td class="text-right">12,000.00</td></tr>
							<tr><td>Basic Salary</td><td class="text-right">4,800.00</td><td class="text-right">4,800.00</td></tr>
							<tr><td>House Rent Allowance</td><td class="text-right">7,200.00</td><td class="text-right">7,200.00</td></tr>
							<tr><td>Gross Salary </td><td class="text-right">12,000.00</td><td class="text-right">12,000.00</td></tr>
							</table>
							</td>
							<td style="width:50%;border-right:0px;padding:0px;vertical-align: top;">
							<table style="width:100%;">
							<tr style="border-bottom:1px solid #333;"><th>Deductions</th><th class="text-right">YID</th><th class="text-right">Amount</th></tr>
							<tr><td>Provident Fund</td><td class="text-right">576.00</td><td class="text-right">576.00</td></tr>
							<tr><td>Employees State Insurance </td><td class="text-right">480.00</td><td class="text-right">480.00</td></tr>
							<tr><td>Advance</td><td class="text-right">1,000.00</td><td class="text-right">1,000.00</td></tr>
							<tr><td>Uniform</td><td class="text-right">600.00</td><td class="text-right">600.00</td></tr>
							<tr><td>Fine (Penalty) </td><td class="text-right">387.09</td><td class="text-right">387.09</td></tr>
							</table>
							</td>
							</tr>
							<tr>
							<td style="width:50%;border-left:0px;padding:0px;vertical-align: top;">
							<table style="width:100%;">
							<tr style=""><th>Total Earnings</th><th class="text-right">12,000.00</th><th class="text-right"> 12,000.00</th></tr>
							</table>
							</td>
							<td style="width:50%;border-right:0px;padding:0px;vertical-align: top;">
							<table style="width:100%;">
							<tr style=""><th>Total Deductions</th><th class="text-right">3,043.09</th><th class="text-right">3,043.09</th></tr>
							</table>
							</td>
							</tr>

							<tr>
							<td style="width:50%;border:0px;padding:0px;vertical-align: top;">
							<table style="width:100%;">
							<tr style=""><th></th><th class="text-right"></th></tr>
							</table>
							</td>
							<td style="width:50%;border:0px;padding:0px;vertical-align: top;">
							<table style="width:100%;">
							<tr style=""><th>Net Pay (Rounded)</th><th class="text-right">8,955.00</th></tr>
							</table>
							</td>
							</tr>


							</table>
							</td>

							</tr>

							<tr>
							<td>
							<table style="width:100%;">
							<tr style=""><td style="width:50%;">
							<p style="margin-top:20px;width:50%;height:20px;border-bottom:1px solid #333;"></p>
							<p>Employer's Signature</p>
							</td>
							<td style="width:50%;" class="text-right">
							<p style="margin-top:20px;width:50%;height:20px;border-bottom:1px solid #333;marg-left:50%;"></p>
							<p>Employee's Signature</p>
							</td></tr>
							</table>
							</td>
							</tr>
							</table>
							</div>


						</div>

                </div>
				<!-- /Page Content -->

            </div>
			<!-- /Page Wrapper -->


@endsection
