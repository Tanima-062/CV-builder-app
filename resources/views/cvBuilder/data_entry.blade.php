<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CV Builder</title>

    <link rel="shortcut icon" href="{!! URL::to('public/cvBuilder/assets/images/fav.jpg') !!}">
    <link rel="stylesheet" href="{!! URL::to('public/cvBuilder/assets/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! URL::to('public/cvBuilder/assets/css/fontawsom-all.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! URL::to('public/cvBuilder/assets/css/style.css') !!}" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/css/foundation.min.css">
    <link href="{!!URL::to('public/cvBuilder/assets/select2/select2.min.css')!!}" rel="stylesheet" />
    <link rel="stylesheet" href="{!! URL::to('public/cvBuilder/assets/bootstrap-datepicker/bootstrap-datepicker.min.css') !!}" type="text/css" />
    <link rel="stylesheet" href="{!! URL::to ('public/cvBuilder/assets/bootstrap-datepicker/jquery-ui.css') !!}">
    <style>
        .CreateTaskBox {
            padding-bottom: 2%;
            margin-left: 20px;
            margin-right: 20px;
            padding-top: 15px;
            box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.16);
            background-color: #ffffff;
            margin-bottom: 20px;
            margin-top: 20px;
        }
        .center {
        height:100%;
        display:flex;
        align-items:center;
        justify-content:center;

        }
        .form-input {
        width:350px;
        padding:20px;
        background:#fff;
        box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
                    3px 3px 7px rgba(94, 104, 121, 0.377);
        }
        .form-input input {
        display:none;

        }
        .form-input label {
        display:block;
        width:45%;
        height:45px;
        margin-left: 25%;
        line-height:50px;
        text-align:center;
        background:#1172c2;

        color:#fff;
        font-size:15px;
        font-family:"Open Sans",sans-serif;
        text-transform:Uppercase;
        font-weight:600;
        border-radius:5px;
        cursor:pointer;
        }

        .form-input img {
        width:100%;
        display:none;

        margin-bottom:30px;
        }
        .right-inner-addon {
            position: relative;
        }


        /* .right-inner-addon input{
        } */

        .right-inner-addon i {
            position: absolute;
            /*text-indent: -15px;
            bottom: -8px;
            font-size: 1.3em;*/
            right: 0px;
            padding: 6px 12px;
        }

    </style>
</head>

<body>

    <div class="CreateTaskBox pl-5 pr-5">
        <form action="{{route('cv.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="center">
                <div class="form-input">
                    <div class="preview">
                        <img id="file-ip-1-preview" style="height:150px; width:300px;">
                    </div>
                    <label for="file-ip-1">Upload Image</label>
                    <input type="file" name="image" id="file-ip-1" accept="image/*" onchange="showPreview(event);">    
                </div>
            </div> 
            <script type="text/javascript">
                function showPreview(event){
                    if(event.target.files.length > 0){
                        var src = URL.createObjectURL(event.target.files[0]);
                        var preview = document.getElementById("file-ip-1-preview");
                        preview.src = src;
                        preview.style.display = "block";
                    }
                }
            </script>
            <div class="row center mt-3">
            <h3 style="color:#09229c;">Personal Info</h3>
            </div>
            <div class="row">
                <div class="col pl-0">
                    <label>Full Name:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="col pr-0">
                    <label>Job Title:</label>
                    <input type="text" name="job_title" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col pl-0">
                    <label>Your Address:</label>
                    <input type="text" name="address" class="form-control" required>
                </div>
                <div class="col pr-0">
                    <label>Your Email:</label>
                    <input type="text" name="email" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col pl-0">
                    <label>Website Link:</label>
                    <input type="text" name="website_link" class="form-control">
                </div>
                <div class="col pr-0">
                    <label>Phone No:</label>
                    <input type="text" name="phone_no" class="form-control" required>
                </div>
            </div>
            <div class="row pl-0">
                <label>Your Bio Here</label>
                <textarea class="form-control" rows="3" name="bio"></textarea>
            </div>
            <div class="row center">
                <h3 style="color:#09229c;">Add Educations</h3>
            </div>
            <div class="pl-3">
                <div class="add-edu-div">
                    <div class="row">
                        <label>Field Of Study:</label>
                        <input type="text" name="field_of_studys[]" class="form-control">
                    </div>
                    <div class="row">
                        <label>Degree:</label>
                        <input type="text" name="degrees[]" class="form-control">
                    </div>
                    <div class="row">
                        <label>School:</label>
                        <input type="text" name="schools[]" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6 pl-0">
                            <label>From year:</label>
                            <div class='right-inner-addon date datepicker pl-0'>
                                <i class="fa fa-calendar-o date-picker"></i>
                                <input name='edu_from_year[]' value="" type="text" class="form-control date-picker date-picker-input" autocomplete="off" readonly id="start_date"/>
                            </div>
                        </div>
                        <div class="col-md-6 container-fluid">
                            <label>To Year:</label>
                            <div class='right-inner-addon date datepicker'>
                                <i class="fa fa-calendar-o date-picker"></i>
                                <input name='edu_to_year[]' value="" type="text" class="form-control date-picker date-picker-input" autocomplete="off" readonly id="end_date"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-edu-div-copy" style="display:none">
                    <div class="row">
                        <label>Field Of Study:</label>
                        <input type="text" name="field_of_studys[]" class="form-control">
                    </div>
                    <div class="row">
                        <label>Degree:</label>
                        <input type="text" name="degrees[]" class="form-control">
                    </div>
                    <div class="row">
                        <label>School:</label>
                        <input type="text" name="schools[]" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6 pl-0">
                            <label>From year:</label>
                            <div class='right-inner-addon date datepicker pl-0'>
                                <i class="fa fa-calendar-o date-picker"></i>
                                <input name='edu_from_year[]' value="" type="text" class="form-control date-picker date-picker-input" autocomplete="off" readonly id="start_date"/>
                            </div>
                        </div>
                        <div class="col-md-6 container-fluid">
                            <label>To Year:</label>
                            <div class='right-inner-addon date datepicker'>
                                <i class="fa fa-calendar-o date-picker"></i>
                                <input name='edu_to_year[]' value="" type="text" class="form-control date-picker date-picker-input" autocomplete="off" readonly id="end_date"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="add-blk btn btn-info" id="add-edu" onClick="addmore('add-edu')"> 
                        <i class="fa fa-plus"></i>
                        <span>Add another education</span>
                    </div>
                </div>
            </div>
            <div class="row center">
                <h3 style="color:#09229c;">Add Experiences</h3>
            </div>
            <div class="pl-3">
                <div class="add-exp-div">
                    <div class="row">
                        <label>Company:</label>
                        <input type="text" name="companys[]" class="form-control">
                    </div>
                    <div class="row">
                        <label>Position:</label>
                        <input type="text" name="positions[]" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6 pl-0">
                            <label>From year:</label>
                            <div class='right-inner-addon date datepicker pl-0'>
                                <i class="fa fa-calendar-o date-picker"></i>
                                <input name='exp_from_year[]' value="" type="text" class="form-control date-picker date-picker-input" autocomplete="off" readonly id="start_date"/>
                            </div>
                        </div>
                        <div class="col-md-6 container-fluid">
                            <label>To Year:</label>
                            <div class='right-inner-addon date datepicker'>
                                <i class="fa fa-calendar-o date-picker"></i>
                                <input name='exp_to_year[]' value="" type="text" class="form-control date-picker date-picker-input" autocomplete="off" readonly id="end_date"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-exp-div-copy" style="display:none;">
                    <div class="row">
                        <label>Company:</label>
                        <input type="text" name="companys[]" class="form-control">
                    </div>
                    <div class="row">
                        <label>Position:</label>
                        <input type="text" name="positions[]" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6 pl-0">
                            <label>From year:</label>
                            <div class='right-inner-addon date datepicker pl-0'>
                                <i class="fa fa-calendar-o date-picker"></i>
                                <input name='exp_from_year[]' value="" type="text" class="form-control date-picker date-picker-input" autocomplete="off" readonly id="start_date"/>
                            </div>
                        </div>
                        <div class="col-md-6 container-fluid">
                            <label>To Year:</label>
                            <div class='right-inner-addon date datepicker'>
                                <i class="fa fa-calendar-o date-picker"></i>
                                <input name='exp_to_year[]' value="" type="text" class="form-control date-picker date-picker-input" autocomplete="off" readonly id="end_date"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="add-blk btn btn-info" id="add-exp" onClick="addmore('add-exp')"> 
                        <i class="fa fa-plus"></i>
                        <span>Add another experience</span>
                    </div>
                </div>
            </div>
            <div class="row center">
                <h3 style="color:#09229c;">Add Skills</h3>
            </div>
            <div class="pl-3">
                <div class="add-skill-div">
                    <div class="row">
                        <label>Skill:</label>
                        <input type="text" name="skills[]" class="form-control">
                    </div>
                    <div class="row">
                        <label>Proficiency:</label>
                        <select name="proficiencys[]" class="form-control">
                            <option value="0-25%">0-25%</option>
                            <option value="25-50%">25-50%</option>
                            <option value="50-75%">50-75%</option>
                            <option value="75-100%">75-100%</option>
                        </select>
                    </div>
                </div>
                <div class="add-skill-div-copy" style="display:none;">
                    <div class="row">
                        <label>Skill:</label>
                        <input type="text" name="skills[]" class="form-control">
                    </div>
                    <div class="row">
                        <label>Proficiency:</label>
                        <select name="proficiencys[]" class="form-control">
                            <option value="0-25%">0-25%</option>
                            <option value="25-50%">25-50%</option>
                            <option value="50-75%">50-75%</option>
                            <option value="75-15%">75-100%</option>
                        </select>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="add-blk btn btn-info" id="add-skill" onClick="addmore('add-skill')"> 
                        <i class="fa fa-plus"></i>
                        <span>Add another skill</span>
                    </div>
                </div>
            </div>
            <div class="row center">
                <h3 style="color:#09229c;">Add Social Links</h3>
            </div>
            <div class="pl-3">
                <div class="add-link-div">
                    <div class="row">
                        <label>Social Platform:</label>
                        <select name="social_names[]" class="form-control">
                            <option value="facebook">Facebook</option>
                            <option value="twitter">Twitter</option>
                            <option value="gmail">Gmail</option>
                            <option value="linkdin">LinkdIn</option>
                            <option value="github">GitHub</option>
                        </select>
                    </div>
                    <div class="row">
                        <label>Social Link:</label>
                        <input type="text" name="social_links[]" class="form-control">
                    </div>
                </div>
                <div class="add-link-div-copy" style="display:none">
                    <div class="row">
                        <select name="social_names[]" class="form-control">
                            <option value="facebook">Facebook</option>
                            <option value="twitter">Twitter</option>
                            <option value="gmail">Gmail</option>
                            <option value="linkdin">LinkdIn</option>
                            <option value="github">GitHub</option>
                        </select>
                    </div>
                    <div class="row">
                        <label>Social Link:</label>
                        <input type="text" name="social_links[]" class="form-control">
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="add-blk btn btn-info" id="add-link" onClick="addmore('add-link')"> 
                        <i class="fa fa-plus"></i>
                        <span>Add another social link</span>
                    </div>
                </div>
            </div>
            <!-- <div class="row center">
                <h3 style="color:#09229c;">Add Hobbies</h3>
            </div>
            <div class="pl-3">
                <div class="row">
                    <select name="hobbys[]" class="form-control select2" multiple>
                        <option value="writing">Writing</option>
                        <option value="cycling">Cycling</option>
                        <option value="football">Football</option>
                        <option value="movies">Movies</option>
                        <option value="travel">Travel</option>
                        <option value="games">Games</option>
                    </select>
                </div>
            </div> -->
            <div class="row center">
                <button class="btn btn-info mt-3" type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

<script src="{!! URL::to('public/cvBuilder/assets/js/jquery-3.2.1.min.js') !!}"></script>
<script src="{!! URL::to('public/cvBuilder/assets/js/popper.min.js') !!}"></script>
<script src="{!! URL::to('public/cvBuilder/assets/js/bootstrap.min.js') !!}"></script>
<script src="{!! URL::to('public/cvBuilder/assets/js/script.js') !!}"></script>
<script src="{!!URL::to('public/cvBuilder/assets/select2/select2.min.js')!!}"></script>
<script src="{!! URL::to('public/cvBuilder/assets/bootstrap-datepicker/bootstrap-datepicker.min.js') !!}" type="text/javascript"></script>

<script>
    const monthNames = ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"];

    $(".fa-calendar-o").on("click", function(){
        $(this).siblings("input").datepicker({
            forceParse:false,
            autoclose: true,
            immediateUpdates: true,
            todayBtn: true,
            todayHighlight: true
        });

        // $(this).siblings("input").datepicker('update', new Date());
        $(this).siblings("input").datepicker('show');
    });

    $('.date-picker').on("change",function(){
        const d = $(this).val().split('/');
        alert(d);
        const date = d[1] + " " +monthNames[Number(d[0]-1)] + ', '+ d[2]+ ' ';
        $(this).val(date);
    });

     $('.select2').select2();
     function addmore(id){
        $('.'+id+'-div-copy').clone().insertAfter('.'+id+'-div:last').removeClass(id+'-div-copy').addClass(id+'-div').show();

        $(".fa-calendar-o").on("click", function(){
            $(this).siblings("input").datepicker({
                forceParse:false,
                autoclose: true,
                immediateUpdates: true,
                todayBtn: true,
                todayHighlight: true
            });

            // $(this).siblings("input").datepicker('update', new Date());
            $(this).siblings("input").datepicker('show');
        });

        $('.date-picker').on("change",function(){
            const d = $(this).val().split('/');
            const date = d[1] + " " +monthNames[Number(d[0]-1)] + ', '+ d[2]+ ' ';
            $(this).val(date);
        });
     }
</script>
</html>