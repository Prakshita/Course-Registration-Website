<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin Page</title>
	<meta name="description" content="This is a course registration website. This is the page for admin CRUD operations." />
	<meta name="keywords" content="courses, course, course registration, classes, register" />
	<meta name="author" content="Devanshu Sheth" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link href="css/ionicons.min.css" rel="stylesheet">
	<link href="css/linear-icon.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/owl.carousel.css" rel="stylesheet">
	<link href="css/owl.theme.css" rel="stylesheet">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/weblysleek-ui-fonts.css">
	<link rel="stylesheet" href="css/main.css">
	<script>
		
		$(document).ready(function () {
            
			$("#btnSubmit").hide();
			$("#result").hide();

			 

            $("#btnSubmit").click(function () {
				$("#result").hide();
				if($("#optionTables").val() != "None")
				{
				$("#btnSubmit").hide();
				}
				$(".div1").empty();
				loadForm();

			
   

			});
            
			if($("#optionTables").val() != "None")
            {
				$("#btnSubmit").show();
                displayForm();
            }
			$("#optionTables").on("change", function () {
				

        		$("#btnSubmit").show();
        		displayForm();
			});
            
			$(document).on('click', '.onUpdate', function () {
				$(".div1").empty();
				$("#nav").remove();
				if($("#optionTables").val() != "None")
                $("#btnSubmit").hide();
                var closesttr = $(this).closest('tr');
               
				//	$(".test").html(closesttr.attr('id'));
				var idUpdate = closesttr.attr('id');
				$.ajax({
					async: false,
					type: "GET",
					url: "getPrimesfromTable.php",
					data: { tablechoice: $("#optionTables").val() },
					dataType: "json",
					success: function (data) {
						var numPrime = data.length;
						if (numPrime == 2) {
							var primekey1 = data[0]['Column_name'];
							var primekey2 = data[1]['Column_name'];
							var trelement = document.getElementById(idUpdate);
							var primarykey1 = trelement.cells[0].innerHTML;
							var primarykey2 = trelement.cells[1].innerHTML;
							$.ajax({
								async: false,
								type: "GET",
								url: "fillFormonUpdate.php",
								data: { tablechoice: $("#optionTables").val(), primarykeyValue1: primarykey1, primekey1: primekey1, primarykeyValue2: primarykey2, primekey2: primekey2 },
								dataType: "json",
								success: function (data) {
									//	$(".test").html(data['DeanId']);
									loadForm();
									var tablestr1 = $('<input type="hidden"/>');
									tablestr1.attr('name', 'originalkey1');
									tablestr1.attr('value', primarykey1);
									$("#form1").append(tablestr1);
									var tablestr2 = $('<input type="hidden"/>');
									tablestr2.attr('name', 'originalkey2');
									tablestr2.attr('value', primarykey2);
									$("#form1").append(tablestr2);
									$("#form1").attr('action', 'updateEntry.php');
									populateForm("#form1", data);
								},
								error: function (ts) {
									alert("Error: error in fillformonupdate numprime2 " + ts.responseText);
								}
							});
						}
						else if (numPrime == 1) {
							var primekey1 = data[0]['Column_name'];
							var trelement = document.getElementById(idUpdate);
							var primarykey1 = trelement.cells[0].innerHTML;
							$.ajax({
								async: false,
								type: "GET",
								url: "fillFormonUpdate.php",
								data: { tablechoice: $("#optionTables").val(), primarykeyValue1: primarykey1, primekey1: primekey1 },
								dataType: "json",
								success: function (data) {
									//$(".test").html(data['DeanId']);
									loadForm();
									var tablestr = $('<input type="hidden"/>');
									tablestr.attr('name', 'originalkey1');
									tablestr.attr('value', primarykey1);
									$("#form1").append(tablestr);
									$("#form1").attr('action', 'updateEntry.php');
									populateForm("#form1", data);
								},
								error: function (ts) {
									alert("error in fillformonupdate numprime1"+ts.responseText);
								}
							});
						}
					},
					error: function (ts) {
						alert(ts.responseText);
					}
				});
			});
			$(document).on('click', '.btnDelete', function () {
				$(".div1").empty();
				$("#nav").remove();
				$("#btnSubmit").show();
				var closesttr = $(this).closest('tr');
				//	$(".test").html(closesttr.attr('id'));
				var idUpdate = closesttr.attr('id');
				//var trelement = document.getElementById(idUpdate);
				$.ajax({
					async: false,
					type: "GET",
					url: "getPrimesfromTable.php",
					data: { tablechoice: $("#optionTables").val() },
					dataType: "json",
					success: function (data) {
						var numPrime = data.length;
						if (numPrime == 2) {
							var primekey1 = data[0]['Column_name'];
							var primekey2 = data[1]['Column_name'];
							var trelement = document.getElementById(idUpdate);
							var primarykey1 = trelement.cells[0].innerHTML;
							var primarykey2 = trelement.cells[1].innerHTML;
							trelement.remove(trelement.selectedIndex);
							$.ajax({
								async: false,
								type: "GET",
								url: "deleteEntry.php",
								data: { tablechoice: $("#optionTables").val(), primarykeyValue1: primarykey1, primekey1: primekey1, primarykeyValue2: primarykey2, primarykey2: primarykey2 },
								dataType: "text",
								success: function (data) {
									alert(data);
								},
								error: function (ts) {
									alert("Error : " + ts.responseText);
								}
							});
						}
						else if (numPrime == 1) {
							var primekey1 = data[0]['Column_name'];
							var trelement = document.getElementById(idUpdate);
							var primarykey1 = trelement.cells[0].innerHTML;
							trelement.remove(trelement.selectedIndex);
							$.ajax({
								async: false,
								type: "GET",
								url: "deleteEntry.php",
								data: { tablechoice: $("#optionTables").val(), primarykeyValue1: primarykey1, primekey1: primekey1 },
								dataType: "text",
								success: function (data) {
									alert(data);
								},
								error: function (ts) {
									alert("Error : " + ts.responseText);
								}
							});
						}
					},
					error: function (ts) {
						alert(ts.responseText);
					}
				});
			});
			function loadForm() {
				$.ajax({
					async: false,
					type: "GET",
					url: "getTableDetails.php",
					data: { tablechoice: $("#optionTables").val() },
					dataType: "json",
					success: function (rows) {
						var tablechoice = $("#optionTables").val();
						//$("#demo").show();
						$form = $('<form class="form-group" id="form1" action="addEntry.php" method="POST"></form>').appendTo('.div1');
						var tablestr = $('<input type="hidden"/>');
						$form.append(tablestr);
						tablestr.attr('name', 'tablename');
						tablestr.attr('value', tablechoice);
						for (var i in rows) {
							var colname = rows[i];
							if (tablechoice == "college" && rows[i] == "DeanId") {
								//$(".test").html(colname);
								$.ajax({
									async: false,
									type: "GET",
									url: "handleDropdown.php",
									data: { tablechoice: "college", columnchoice: "DeanId" },
									dataType: "json",
									success: function (datarows) {
										var selectstr = $('<select class="form-control">');
										$form.append("<p>" + "DeanId" + " : ");
										selectstr.attr('name', 'DeanId');
										$form.append(selectstr);
										for (var i in datarows) {
											var datarow = datarows[i];
											var coldata = datarow['ID'];
											$(selectstr).append('<option>' + datarow['ID'] + '</option>');
										}
										$form.append('</select></p>');
									}
								});
							}
							else if (tablechoice == "collegephone" && rows[i] == "CName") {
								//$(".test").html(colname);
								$.ajax({
									async: false,
									type: "GET",
									url: "handleDropdown.php",
									data: { tablechoice: "collegephone", columnchoice: "CName" },
									dataType: "json",
									success: function (datarows) {
										var selectstr = $('<select class="form-control">');
										$form.append("<p>" + "CName" + " : ");
										$form.append(selectstr);
										selectstr.attr('name', "CName");
										for (var i in datarows) {
											var datarow = datarows[i];
											var coldata = datarow['CName'];
											$(selectstr).append('<option>' + datarow['CName'] + '</option>');
										}
										$form.append('</select></p>');
										//	 $form.append("<p>" + '<input type="submit" value ="Add Entry" />' +  "</p>");
									}
								});
							}
							else if (tablechoice == "course" && rows[i] == "CoDCode") {
								//$(".test").html(colname);
								$.ajax({
									async: false,
									type: "GET",
									url: "handleDropdown.php",
									data: { tablechoice: "course", columnchoice: "CoDCode" },
									dataType: "json",
									success: function (datarows) {
										var selectstr = $('<select class="form-control">');
										$form.append("<p>" + "CoDCode" + " : ");
										$form.append(selectstr);
										selectstr.attr('name', "CoDCode");
										for (var i in datarows) {
											var datarow = datarows[i];
											var coldata = datarow['DCode'];
											$(selectstr).append('<option>' + datarow['DCode'] + '</option>');
										}
										$form.append('</select></p>');
										//	 $form.append("<p>" + '<input type="submit" value ="Add Entry" />' +  "</p>");
									}
								});
							}
							else if (tablechoice == "department" && rows[i] == "DeptChairID") {
								//$(".test").html(colname);
								$.ajax({
									async: false,
									type: "GET",
									url: "handleDropdown.php",
									data: { tablechoice: "department", columnchoice: "DeptChairID" },
									dataType: "json",
									success: function (datarows) {
										var selectstr1 = $('<select class="form-control">');
										$form.append("<p>" + "DeptChairID" + " : ");
										$form.append(selectstr1);
										selectstr1.attr('name', "DeptChairID");
										for (var i in datarows) {
											var datarow = datarows[i];
											var coldata = datarow['ID'];
											if (datarow['ID']) {
												$(selectstr1).append('<option>' + datarow['ID'] + '</option>');
											}
										}
										$form.append('</select class="form-control"></p>');
										var selectstr = $('<select>');
										$form.append("<p>" + "CName" + " : ");
										$form.append(selectstr);
										selectstr.attr('name', "CName");
										for (var i in datarows) {
											var datarow = datarows[i];
											var coldata = datarow['CName'];
											if (datarow['CName']) {
												$(selectstr).append('<option>' + datarow['CName'] + '</option>');
											}
										}
										$form.append('</select></p>');
										//		 $form.append("<p>" + '<input type="submit" value ="Add Entry" />' +  "</p>");
									}
								});
							}
							else if (tablechoice == "deptphone" && rows[i] == "DCode") {
								//$(".test").html(colname);
								$.ajax({
									async: false,
									type: "GET",
									url: "handleDropdown.php",
									data: { tablechoice: "course", columnchoice: "DCode" },
									dataType: "json",
									success: function (datarows) {
										var selectstr = $('<select class="form-control">');
										$form.append("<p>" + "DCode" + " : ");
										$form.append(selectstr);
										selectstr.attr('name', "DCode");
										for (var i in datarows) {
											var datarow = datarows[i];
											var coldata = datarow['DCode'];
											$(selectstr).append('<option>' + datarow['DCode'] + '</option>');
										}
										$form.append('</select></p>');
										//		 $form.append("<p>" + '<input type="submit" value ="Add Entry" />' +  "</p>");
									}
								});
							}
							else if (tablechoice == "instrphone" && rows[i] == "ID") {
								//$(".test").html(colname);
								$.ajax({
									async: false,
									type: "GET",
									url: "handleDropdown.php",
									data: { tablechoice: "instrphone", columnchoice: "ID" },
									dataType: "json",
									success: function (datarows) {
										var selectstr = $('<select class="form-control">');
										$form.append("<p>" + "ID" + " : ");
										$form.append(selectstr);
										selectstr.attr('name', "ID");
										for (var i in datarows) {
											var datarow = datarows[i];
											var coldata = datarow['ID'];
											$(selectstr).append('<option>' + datarow['ID'] + '</option>');
										}
										$form.append('</select></p>');
										//	 $form.append("<p>" + '<input type="submit" value ="Add Entry" />' +  "</p>");
									}
								});
							}
							else if (tablechoice == "instructor" && rows[i] == "DCode") {
								//$(".test").html(colname);
								$.ajax({
									async: false,
									type: "GET",
									url: "handleDropdown.php",
									data: { tablechoice: "instructor", columnchoice: "DCode" },
									dataType: "json",
									success: function (datarows) {
										var selectstr = $('<select class="form-control">');
										$form.append("<p>" + "DCode" + " : ");
										$form.append(selectstr);
										selectstr.attr('name', "DCode");
										for (var i in datarows) {
											var datarow = datarows[i];
											var coldata = datarow['DCode'];
											$(selectstr).append('<option>' + datarow['DCode'] + '</option>');
										}
										$form.append('</select></p>');
										//	 $form.append("<p>" + '<input type="submit" value ="Add Entry" />' +  "</p>");
									}
								});
							}
							else if (tablechoice == "section" && rows[i] == "InstructorID") {
								//$(".test").html(colname);
								$.ajax({
									async: false,
									type: "GET",
									url: "handleDropdown.php",
									data: { tablechoice: "section", columnchoice: "CoCode" },
									dataType: "json",
									success: function (datarows) {
										var selectstr = $('<select class="form-control">');
										$form.append("<p>" + "InstructorID" + " : ");
										$form.append(selectstr);
										selectstr.attr('name', "InstructorID");
										for (var i in datarows) {
											var datarow = datarows[i];
											var coldata = datarow['ID'];
											if (datarow['ID']) {
												$(selectstr).append('<option>' + datarow['ID'] + '</option>');
											}
										}
										$form.append('</select></p>');
										var selectstr1 = $('<select class="form-control">');
										$form.append("<p>" + "CoCode" + " : ");
										$form.append(selectstr1);
										selectstr1.attr('name', "CoCode");
										for (var i in datarows) {
											var datarow = datarows[i];
											var coldata = datarow['CoCode'];
											if (datarow['CoCode']) {
												$(selectstr1).append('<option>' + datarow['CoCode'] + '</option>');
											}
										}
										$form.append('</select></p>');
										//	 $form.append("<p>" + '<input type="submit" value ="Add Entry" />' +  "</p>");
									}
								});
							}
							else if (tablechoice == "student" && rows[i] == "DCode") {
								//$(".test").html(colname);
								$.ajax({
									async: false,
									type: "GET",
									url: "handleDropdown.php",
									data: { tablechoice: "student", columnchoice: "DCode" },
									dataType: "json",
									success: function (datarows) {
										var selectstr = $('<select class="form-control">');
										$form.append("<p>" + "DCode" + " : ");
										$form.append(selectstr);
										selectstr.attr('name', "DCode");
										for (var i in datarows) {
											var datarow = datarows[i];
											var coldata = datarow['DCode'];
											$(selectstr).append('<option>' + datarow['DCode'] + '</option>');
										}
										$form.append('</select></p>');
										//		 $form.append("<p>" + '<input type="submit" value ="Add Entry" />' +  "</p>");
									}
								});
							}
							else if (tablechoice == "studentphone" && rows[i] == "SID") {
								//$(".test").html(colname);
								$.ajax({
									async: false,
									type: "GET",
									url: "handleDropdown.php",
									data: { tablechoice: "studentphone", columnchoice: "SID" },
									dataType: "json",
									success: function (datarows) {
										var selectstr = $('<select class="form-control">');
										$form.append("<p>" + "SID" + " : ");
										$form.append(selectstr);
										selectstr.attr('name', "SID");
										for (var i in datarows) {
											var datarow = datarows[i];
											var coldata = datarow['SID'];
											$(selectstr).append('<option>' + datarow['SID'] + '</option>');
										}
										$form.append('</select></p>');
										//		 $form.append("<p>" + '<input type="submit" value ="Add Entry" />' +  "</p>");
									}
								});
							}
							else if (tablechoice == "takes" && rows[i] == "SecID") {
								//$(".test").html(colname);
								$.ajax({
									async: false,
									type: "GET",
									url: "handleDropdown.php",
									data: { tablechoice: "takes", columnchoice: "SecID" },
									dataType: "json",
									success: function (datarows) {
										var selectstr = $('<select class="form-control">');
										$form.append("<p>" + "SID" + " : ");
										$form.append(selectstr);
										selectstr.attr('name', "SID");
										for (var i in datarows) {
											var datarow = datarows[i];
											var coldata = datarow['SID'];
											if (datarow['SID']) {
												$(selectstr).append('<option>' + datarow['SID'] + '</option>');
											}
										}
										$form.append('</select></p>');
										var selectstr1 = $('<select class="form-control">');
										$form.append("<p>" + "SecID" + " : ");
										$form.append(selectstr1);
										selectstr1.attr('name', "SecID");
										for (var i in datarows) {
											var datarow = datarows[i];
											var coldata = datarow['SecId'];
											if (datarow['SecId']) {
												$(selectstr1).append('<option>' + datarow['SecId'] + '</option>');
											}
										}
										$form.append('</select></p>');
										//		 $form.append("<p>" + '<input type="submit" value ="Add Entry" />' +  "</p>");
									}
								});
							}
							else if (tablechoice == "logindetail" && rows[i] == "user_type")
							{
							
								var selectstr = $('<select class="form-control">');
										$form.append("<p>" + "User_type" + " : ");
										$form.append(selectstr);
										selectstr.attr('name', "user_type");
										$(selectstr).append('<option>admin</option><option>user</option>')
										$form.append('</select></p>');
							}
							else if (tablechoice == "logindetail" && rows[i] == "SID")
							{
								$.ajax({
									async: false,
									type: "GET",
									url: "handleDropdown.php",
									data: { tablechoice: "logindetail", columnchoice: "SID" },
									dataType: "json",
									success: function (datarows) {
										var selectstr = $('<select class="form-control">');
										$form.append("<p>" + "SID" + " : ");
										$form.append(selectstr);
										selectstr.attr('name', "SID");
										for (var i in datarows) {
											var datarow = datarows[i];
											var coldata = datarow['SID'];
											if (datarow['SID']) {
												$(selectstr).append('<option>' + datarow['SID'] + '</option>');
											}
										}
										$form.append('</select></p>');
									}
								});
							}
							else if (tablechoice == "cart" && rows[i] == "SecId") {
								//$(".test").html(colname);
								$.ajax({
									async: false,
									type: "GET",
									url: "handleDropdown.php",
									data: { tablechoice: "cart", columnchoice: "SecId" },
									dataType: "json",
									success: function (datarows) {


										var selectstr = $('<select class="form-control">');
										$form.append("<p>" + "SID" + " : ");
										$form.append(selectstr);

										selectstr.attr('name', "SID");

										for (var i in datarows) {
											var datarow = datarows[i];

											var coldata = datarow['SID'];
											if (datarow['SID']) {
												$(selectstr).append('<option>' + datarow['SID'] + '</option>');
											}


										}
										$form.append('</select></p>');


										var selectstr1 = $('<select class="form-control">');
										$form.append("<p>" + "SecId" + " : ");
										$form.append(selectstr1);

										selectstr1.attr('name', "SecId");

										for (var i in datarows) {
											var datarow = datarows[i];

											var coldata = datarow['SecId'];
											if (datarow['SecId']) {
												$(selectstr1).append('<option>' + datarow['SecId'] + '</option>');
											}


										}
										$form.append('</select></p>');

									

										



										//		 $form.append("<p>" + '<input type="submit" value ="Add Entry" />' +  "</p>");
									}

								});
							}
							else if (rows[i] == "Deleted") {
								var selectstr = $('<select class="form-control">');
								$form.append("<p>" + colname + " : ");
								$form.append(selectstr);
								selectstr.attr('name', colname);
								$(selectstr).append('<option>' + "Y" + '</option>');
								$(selectstr).append('<option selected>' + "N" + '</option>');
								$form.append('</select></p>');
								$form.append("<p>" + '<input class="btn btn-primary" type="submit" value ="Add Entry" />' + "</p>");
								$form.append("<p>" + '<a class="btn btn-primary" href="setSession.php">Cancel</a>' + "</p>");
							}
							else if ((tablechoice == "section" && rows[i] == "CoCode") || (tablechoice == "takes" && rows[i] == "SID") || (tablechoice == "department" && rows[i] == "CName") ||  (tablechoice == "cart" && rows[i] == "SID")) {
							}
							else {
								var htmlstr = $('<input class="form-control" type="text"/>');
								$form.append("<p>" + colname + " : ");
								$form.append(htmlstr);
								$form.append("</p>");
								htmlstr.attr('name', colname);
							}
						}
					}
				});
			}
			function populateForm(frm, data) {
				$.each(data, function (key, value) {
					var $ctrl = $('[name=' + key + ']', frm);
					if ($ctrl.is('select')) {
						$("option", $ctrl).each(function () {
							if (this.value == value) { this.selected = true; }
						});
					}
					else {
						switch ($ctrl.attr("type")) {
							case "text": case "hidden": case "textarea":
								$ctrl.val(value);
								break;
							case "radio": case "checkbox":
								$ctrl.each(function () {
									if ($(this).attr('value') == value) { $(this).attr("checked", value); }
								});
								break;
						}
					}
				});
			}
			function displayForm() {
				$("#demo #headtable tr").remove();
				$("#demo #headtable th").remove();
				$(".div1").empty();
				var columnnames = [];
				$("#demo tbody tr").remove();
				$("#demo tbody td").remove();
				$("#nav").remove();
				$.ajax({
					async: false,
					type: "GET",
					url: "getTableDetails.php",
					data: { tablechoice: $("#optionTables").val() },
					dataType: "json",
					success: function (rows) {
						$("#result").show();
						$("#demo #headtable").append("<tr>");
						for (var i in rows) {
							var row = rows[i];
							columnnames[i] = rows[i];
							$("#demo #headtable").append("<th>" + row + "</th>");
						}
						$("#demo #headtable").append("<th>Delete</th>");
						$("#demo #headtable").append("</tr>");
					}
				});
				$.ajax({
					type: "GET",
					url: "getTableInfo.php",
					data: { tablechoice: $("#optionTables").val() },
					dataType: "json",
					success: function (rows) {
						var numrows = 0;
						var table = document.getElementById("demo");
						for (var i in rows) {
							
							var row = table.insertRow(-1);
							row.id = "rowDelete" + i.toString();
							var row1 = rows[i];
							for (var j in columnnames) {
								var cell1 = row.insertCell(-1);
								cell1.innerHTML = row1[columnnames[j]];
								cell1.className = "onUpdate";
							}
							var cell2 = row.insertCell(-1);
							cell2.innerHTML = '<button class="btnDelete btn btn-danger" value="Delete" >Delete</button>';
							cell2.className = "onUpdate";

							
							//	$(".test").html(row.id);
						}
						var numrows = table.getElementsByTagName("tr").length;
							
						paginate(numrows, 6);
					}
					
				});

				

			}


function paginate(numrows, rowshown){

	$("#demo").after('<div id="nav"></div>');
		

				var rowsShown = rowshown;
				var rowsTotal = numrows;

				var table = document.getElementById("demo");
				var classrows = table.getElementsByTagName("tr");
				
				var numPages = rowsTotal/rowsShown;
				for(i = 0;i < numPages;i++) {
					var pageNum = i + 1;
					$('#nav').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
				}
				$(classrows).hide();
				$(classrows).slice(0, rowsShown).show();
				$('#nav a:first').addClass('active');
				$('#nav a').bind('click', function(){

					$('#nav a').removeClass('active');
					$(this).addClass('active');
					var currPage = $(this).attr('rel');
					var startItem = currPage * rowsShown;
					var endItem = startItem + rowsShown;
					$(classrows).css('opacity','0.0').hide().slice(startItem, endItem).css('display','table-row').animate({opacity:1}, 300);
				});

}

		});
	</script>
	<style>
		
		
		table,
		td,
		th {
			border: 1px solid #ddd;
			text-align: left;
		}
		table {
			border-collapse: collapse;
			width: 100%;
		}
		.pageheader {
			text-align: center;
            
		}
        .pageheader a{
			text-decoration: none;
            color: black;
			
		}
		th,
		td {
			padding: 15px;
		}
		tr:hover {
			background-color: #f5f5f580;
			color: black;
		}
		td:hover {
			background-color: #ddda2393;
			color: black;
		}
		.btncancel {
  font: 20px Arial;
  text-decoration: none;
  background-color:blue;
  color: black;
  padding: 2px 12px 2px 12px;
  border-top: 1px solid #CCCCCC;
  border-right: 1px solid #333333;
  border-bottom: 1px solid #333333;
  border-left: 1px solid #CCCCCC;
}
.btncancel:hover {
  font: 20px Arial;
  text-decoration: none;
  background-color:#ADD8E6;
  color: black;
  padding: 2px 12px 2px 12px;
  border-top: 1px solid #CCCCCC;
  border-right: 1px solid #333333;
  border-bottom: 1px solid #333333;
  border-left: 1px solid #CCCCCC;
}

	</style>
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">
          <img src="images/utd.png" alt="">
          <span class="text--bold">Admin Page</span>
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="active">
            <a href="index.html">home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li>
            <a href="about.html">about</a>
          </li>
          <li>
            <a href="login.php">login</a>
          </li>
          <li>
            <a href="register.php">register</a>
          </li>
          
          <li>
            <a href="contact.html">contact us</a>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

  <!-- HOME -->
  <section id="home" class="section jumbotron-section bg--position-center no-repeat bg-cover md-display-table" >
  <div>
  
  
  
	  <p>
		  Table Name:
		  <select class="form-control" name="optionTables" id="optionTables" >
			  <option selected value="<?php echo (isset($_SESSION['coltod'])) ? htmlspecialchars($_SESSION['coltod']) : 'None'; ?>" label="..."></option>
			  <option>cart</option>
			  <option>college</option>
			  <option>collegephone</option>
			  <option>course</option>
			  <option>department</option>
			  <option>deptphone</option>
			  <option>instrphone</option>
			  <option>instructor</option>
			  <option>logindetail</option>
			  <option>section</option>
			  <option>student</option>
			  <option>studentphone</option>
			  <option>takes</option>
		  </select>
  
	  </p>
  </div>
	  <div class="div1 container"></div>
	  <div id="result">
		  <table id="demo" class=".table-striped">
			  <thead id="headtable">
			  </thead>
			  <tbody>
			  </tbody>
		  </table>
  
	  </div>
	  
	  
		  <button class="btn btn-primary" id="btnSubmit">Add A New Entry</button>
	 
  </section>

<!-- FOOTER -->
<footer>
    <section class="footer-bottom">
      <div class="container">
        <hr class="footer-devider">
        <div class="row">
          <div class="col-md-5">
            <p class="copyright">Copyright © 2017 UTD COURSE REGISTRATION</p>
          </div>
          <div class="col-md-2">
            <a id="scroll-top-div" href="" class="pull-right back-top-btn">back to top
              <span class="btn-icon">
                <i class="ion-ios-arrow-thin-up"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
    </section>
  </footer>

	<script src="js/jquery-3.1.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
	</body>


</html>