@extends('layout.master')
@section('content')
    <div class="jumbotron text-center">
        <img src="/img/LOGO.png" alt="logo" height=200>
        <h5>
            ZARKAWT, AIZAWL, MIZORAM
        </h5>
    </div>

    <div class="card">
        <div class="card-body text-center">
            <h2>
                JP Career Point conducts Free Counseling cum Mock interview every year for students/aspirants who clear Mains Exams.
            </h2>
            <img src="/img/exam.jpg" alt="exam">
        </div>
    </div>

    <div id="ourfaculty" class="container-fluid text-center">
        <h4>OUR FACULTY</h4>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <img src="/img/sudhir.png" class="card-img-top" alt="sudhir" width="50">
                    <div class="card-body">
                        <h5 class="card-title">Sudhir Kumar</h5>
                        <p class="card-text">MA (UGC-NET)</p>
                        <p class="card-text">Hindu College, Delhi</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="/img/ashish.png" class="card-img-top" alt="ashish" width="50">
                    <div class="card-body">
                        <h5 class="card-title">Ashish Sharma</h5>
                        <p class="card-text">MBA, Punjab University, chandigarh</p>
                        <p class="card-text">MA History (HPU, Shimla)</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="/img/chiranth.png" class="card-img-top" alt="sudhir" width="50">
                    <div class="card-body">
                        <h5 class="card-title">Chiranth Rajeshkar</h5>
                        <p class="card-text">M.S Cornell University, USA (Tata Fellow)</p>
                        <p class="card-text">M.Sc Ag, TNAU, Coimbatore</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="/img/mane.png" class="card-img-top" alt="ashish" width="50">
                    <div class="card-body">
                        <h5 class="card-title">Mane Sunil Shankar</h5>
                        <p class="card-text">MKV, University Parbahani</p>
                        <p class="card-text">B.tech (Food Tech)</p>
                    </div>
                </div>
            </div>
        </div>
        <h4><i><small>Note: Including experienced local faculty for General English, Communications, Arithmetic & Reasongin and Mizo subjects.</small></i></h4>
    </div>

    <div class="jumbotron" id="courses">
    <h3 class="text-center">Courses Offered & Fee Structure</h3>
        <div class="row">
            <div class="col-md-4 offset-2">
                <table class="table">
                    <tr>
                        <th colspan=2>MPSC Combined Competitive Exam</th>
                    </tr>
                    <tr>
                        <td>Prelims</td>
                        <td>3 Months</td>
                    </tr>
                    <tr>
                        <td>Prelims cum Mains</td>
                        <td>7 Months</td>
                    </tr>
                    <tr>
                        <td>Foundation Course</td>
                        <td>1 Year</td>
                    </tr>
                    <tr>
                        <td colspan=2><b>Timing</b></td>
                    </tr>
                    <tr>
                        <td>Morning Shift</td>
                        <td>6:30 - 9:30 A.M.</td>
                    </tr>
                    <tr>
                        <td>Evening Shift</td>
                        <td>4:00 - 7:00 P.M.</td>
                    </tr>
                    <tr>
                        <th colspan=2>
                            Bank, SSC, Group-B Coaching : 3 Months
                            <br><br>
                            Timing
                        </th>
                    </tr>
                    <tr>
                        <td>Morning Shift</td>
                        <td>6:30 - 8:00 A.M.</td>
                    </tr>
                    <tr>
                        <td>Evening Shift</td>
                        <td>4:00 - 5:30 P.M.</td>
                    </tr>
                    <tr>
                        <th colspan=2>Medical & Engineering Entrance Coaching <br>(1 Year Regular course)</th>
                    </tr>
                    <tr>
                        <th>Timing</th>
                        <td>89:30 - 1:00 P.M.</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4">
                <table class="table">
                    <tr>
                        <th>Fee Structure</th>
                    </tr>
                    <tr>
                        <td>Prelims (3 Months)</td>
                        <td>23,000/-</td>
                    </tr>
                    <tr>
                        <td>Prelims cum Mains (7 Months)</td>
                        <td>35,000/-</td>
                    </tr>
                    <tr>
                        <td>Foundation Course (1 Year)</td>
                        <td>40,000/-</td>
                    </tr>
                    <tr>
                        <td>Adminssion</td>
                        <td>1,500/-</td>
                    </tr>
                    <tr>
                        <td>Miscellaneous</td>
                        <td>500/-</td>
                    </tr>
                    <tr>
                        <th>
                            Bank Coaching, SSC, Group-B Coaching : 3 Months
                        </th>
                        <td>8,000/-</td>
                    </tr>
                    <tr>
                        <th colspan=2>Medical & Engineering Coaching</th>
                    </tr>
                    <tr>
                        <td>Admission</td>
                        <td>2,000</td>
                    </tr>
                    <tr>
                        <td>Monthly</td>
                        <td>2,5000</td>
                    </tr>
                    <tr>
                        <th colspan=2>Our Strengths</th>
                    </tr>
                    <tr>
                        <th colspan=2>
                            Experienced faculty from Delhi
                            <br>
                            Free updated study materials and regular weekly test.
                            <br>
                            Free Counselling cum Mock interview
                            <br>
                            Fully equipped classroom with projector facilities\
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection