<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> CV Builder</title>

    <link rel="shortcut icon" href="{!! URL::to('public/cvBuilder/assets/images/fav.jpg') !!}">
    <link rel="stylesheet" href="{!! URL::to('public/cvBuilder/assets/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! URL::to('public/cvBuilder/assets/css/fontawsom-all.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! URL::to('public/cvBuilder/assets/css/style.css') !!}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.js"></script>
</head>

<body>
    <div class="container-fluid overcover">
        <div class="container profile-box">
            <div class="row">
                <div class="col-md-4 left-co">
                    <div class="left-side">
                        <div class="profile-info">
                            @if(file_exists("{!! URL::to('public/cvBuilder/assets/uploads/profile_images/'.$personal_info->id . '/'.$personal_info->image) !!}"))
                                <img src="{!! URL::to('public/cvBuilder/assets/uploads/profile_images/'.$personal_info->id . '/'.$personal_info->image) !!}" style="height:150px;" alt="">
                            @else
                                <img src="{!! URL::to('public/cvBuilder/assets/images/profile.jpg') !!}" alt="">
                            @endif
                            <h3>{{$personal_info->name}}</h3>
                            <span>{{$personal_info->job_title}}</span>
                        </div>
                        <h4 class="ltitle">Contact</h4>
                        <div class="contact-box pb0">
                            <div class="icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="detail">
                                {{$personal_info->phone_no}} <br>
                                {{$personal_info->phone_no}}
                            </div>
                        </div>
                        @if(isset($personal_info->website_link))
                            <div class="contact-box pb0">
                                <div class="icon">
                                    <i class="fas fa-globe-americas"></i>
                                </div>
                                <div class="detail">
                                    {{$personal_info->website_link}} <br>
                                    {{$personal_info->website_link}}
                                </div>
                            </div>
                        @endif
                        <div class="contact-box pb0">
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="detail">
                                {{$personal_info->address}}
                            </div>
                        </div>
                        <!-- @foreach($personal_info->social_links as $link)
                            @if((isset($link->link)) && ($link->name=='facebook'))
                                <div class="contact-box pb0">
                                    <div class="icon">
                                        <i class="fab fa-facebook-f"></i>
                                    </div>
                                    <div class="detail">
                                        {{$link->link}} <br>
                                        {{$link->link}}
                                    </div>
                                </div>
                            @elseif((isset($link->link)) && ($link->name=='twitter'))
                                <div class="contact-box pb0">
                                    <div class="icon">
                                        <i class="fab fa-twitter"></i>
                                    </div>
                                    <div class="detail">
                                        {{$link->link}} <br>
                                        {{$link->link}}
                                    </div>
                                </div>
                            @elseif((isset($link->link)) && ($link->name=='gmail'))
                                <div class="contact-box pb0">
                                    <div class="icon">
                                        <i class="fab fa-google-plus-g"></i>
                                    </div>
                                    <div class="detail">
                                        {{$link->link}} <br>
                                        {{$link->link}}
                                    </div>
                                </div>
                            @elseif((isset($link->link)) && ($link->name=='linkdin'))
                                <div class="contact-box pb0">
                                    <div class="icon">
                                        <i class="fab fa-linkedin-in"></i>
                                    </div>
                                    <div class="detail">
                                        {{$link->link}} <br>
                                        {{$link->link}}
                                    </div>
                                </div>
                            @elseif((isset($link->link)) && ($link->name=='github'))
                                <div class="contact-box pb0">
                                    <div class="icon">
                                        <i class="fab fa-github"></i>
                                    </div>
                                    <div class="detail">
                                        {{$link->link}} <br>
                                        {{$link->link}}
                                    </div>
                                </div>
                            @endif
                        @endforeach -->
                        
                        <h4 class="ltitle">Referencess</h4>

                        <div class="refer-cov">
                            <b>Jonney Smith</b>
                            <p>CEO Casinocarol</p>
                            <span>p +00 890 1232 8767</span>
                        </div>
                        <div class="refer-cov">
                            <b>Jonney Smith</b>
                            <p>System Administrator</p>
                            <span>p +00 890 1232 8767</span>
                        </div>
                        <!-- <h4 class="ltitle">Hobbies</h4>
                        <ul class="hoby row no-margin">
                            @foreach($personal_info->hobbys as $hobby)
                                @if($hobby->name=='writing')
                                    <li><i class="fas fa-pencil-alt"></i> <br> Writing</li>
                                @elseif($hobby->name=='cycling')
                                    <li><i class="fas fa-bicycle"></i> <br> Cycling</li>
                                @elseif($hobby->name=='football')
                                    <li><i class="fas fa-futbol"></i> <br> Football</li>
                                @elseif($hobby->name=='movies')
                                    <li><i class="fas fa-film"></i><br> Movies</li>
                                @elseif($hobby->name=='travel')
                                    <li><i class="fas fa-plane-departure"></i> <br>Travel</li>
                                @elseif($hobby->name=='games')
                                    <li><i class="fas fa-gamepad"></i> <br> Games</li>
                                @endif
                            @endforeach
                        </ul> -->
                    </div>
                </div>
                <div class="col-md-8 rt-div">
                    <div class="rit-cover">
                        <div id="download" class="row offset-8" style="background-color:#00ab9f; text-align:center; padding:10px; margin-top:10px;">
                            <a><i class="fas fa-cloud-download-alt"></i> Download Resume</a>
                        </div>
                        <div class="hotkey">
                            <h1 class="">{{$personal_info->name}} </h1>
                            <small>{{$personal_info->job_title}}</small>
                        </div>
                        <h2 class="rit-titl"><i class="far fa-user"></i> Profile</h2>
                        <div class="about">
                            <p>{{$personal_info->bio}}</p>
                        </div>

                        <h2 class="rit-titl"><i class="fas fa-briefcase"></i> Work Experiance</h2>
                        @foreach($personal_info->experiences as $exp)
                        <div class="work-exp">
                            <h6>{{$exp->position}} <span>{{date('Y',strtotime($exp->from_year))}}-{{date('Y',strtotime($exp->to_year))}}</span></h6>
                            <i>{{$exp->company}}</i>
                            <!-- <ul>
                                <li><i class="far fa-hand-point-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
                                <li><i class="far fa-hand-point-right"></i> Sorem dolor sit amet, consectetur. </li>
                                <li><i class="far fa-hand-point-right"></i> Porem ipsum sit amet, consectetur adipiscing </li>
                            </ul> -->
                        </div>
                        @endforeach

                        <h2 class="rit-titl"><i class="fas fa-graduation-cap"></i> Education</h2>
                        <div class="education">
                            <ul class="row no-margin">
                                @foreach($personal_info->educations as $edu)
                                    <li class="col-md-6"><span>{{date('Y',strtotime($edu->from_year))}}-{{date('Y',strtotime($edu->to_year))}}</span> <br>
                                    {{$edu->degree}} - {{$edu->school}}</li>
                               @endforeach
                            </ul>
                        </div>

                        <h2 class="rit-titl"><i class="fas fa-users-cog"></i> Skills</h2>
                        <div class="profess-cover row no-margin">
                            @foreach($personal_info->skills as $skills)
                            @if((isset($skills->proficiency)) && ($skills->proficiency == '50-75%'))
                            <div class="col-md-6">
                                <div class="prog-row row">
                                    <div class="col-sm-6">
                                        {{$skills->skill}}
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @elseif((isset($skills->proficiency)) && ($skills->proficiency == '75-100%'))
                            <div class="col-md-6">
                                <div class="row prog-row">
                                    <div class="col-sm-6">
                                        {{$skills->skill}}
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @elseif((isset($skills->proficiency)) && ($skills->proficiency == '0-25%'))
                            <div class="col-md-6">
                                <div class="row prog-row">
                                    <div class="col-sm-6">
                                        {{$skills->skill}}
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @elseif((isset($skills->proficiency)) && ($skills->proficiency == '25-50%'))
                            <div class="col-md-6">
                                <div class="row prog-row">
                                    <div class="col-sm-6">
                                        {{$skills->skill}}
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach






                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="{!! URL::to('public/cvBuilder/assets/js/jquery-3.2.1.min.js') !!}"></script>
<script src="{!! URL::to('public/cvBuilder/assets/js/popper.min.js') !!}"></script>
<script src="{!! URL::to('public/cvBuilder/assets/js/bootstrap.min.js') !!}"></script>
<script src="{!! URL::to('public/cvBuilder/assets/js/script.js') !!}"></script>

<script>
    window.onload = function(){
        document.getElementById('download').addEventListener("click", () =>{
            const body = this.document.getElementById('body');
            console.log(body);
            console.log(window);
            html2pdf().from(body).save();
        });
    }
</script>


</html>