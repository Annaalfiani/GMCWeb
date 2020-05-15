@extends('templates.admin')
@section('content')
    <div class="row">
        <div class="col-xl-8">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 m-b-30 header-title">Latest Transactions</h4>

                    <div class="table-responsive">
                        <table class="table m-t-20 mb-0 table-vertical">

                            <tbody>
                            <tr>
                                <td>
                                    <img src="assets/images/users/avatar-2.jpg" alt="user-image" class="thumb-sm rounded-circle mr-2"/>
                                    Herbert C. Patton
                                </td>
                                <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                <td>
                                    $14,584
                                    <p class="m-0 text-muted font-14">Amount</p>
                                </td>
                                <td>
                                    5/12/2016
                                    <p class="m-0 text-muted font-14">Date</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <img src="assets/images/users/avatar-3.jpg" alt="user-image" class="thumb-sm rounded-circle mr-2"/>
                                    Mathias N. Klausen
                                </td>
                                <td><i class="mdi mdi-checkbox-blank-circle text-warning"></i> Waiting payment</td>
                                <td>
                                    $8,541
                                    <p class="m-0 text-muted font-14">Amount</p>
                                </td>
                                <td>
                                    10/11/2016
                                    <p class="m-0 text-muted font-14">Date</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <img src="assets/images/users/avatar-4.jpg" alt="user-image" class="thumb-sm rounded-circle mr-2"/>
                                    Nikolaj S. Henriksen
                                </td>
                                <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                <td>
                                    $954
                                    <p class="m-0 text-muted font-14">Amount</p>
                                </td>
                                <td>
                                    8/11/2016
                                    <p class="m-0 text-muted font-14">Date</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <img src="assets/images/users/avatar-5.jpg" alt="user-image" class="thumb-sm rounded-circle mr-2"/>
                                    Lasse C. Overgaard
                                </td>
                                <td><i class="mdi mdi-checkbox-blank-circle text-danger"></i> Payment expired</td>
                                <td>
                                    $44,584
                                    <p class="m-0 text-muted font-14">Amount</p>
                                </td>
                                <td>
                                    7/11/2016
                                    <p class="m-0 text-muted font-14">Date</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <img src="assets/images/users/avatar-6.jpg" alt="user-image" class="thumb-sm rounded-circle mr-2"/>
                                    Kasper S. Jessen
                                </td>
                                <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                <td>
                                    $8,844
                                    <p class="m-0 text-muted font-14">Amount</p>
                                </td>
                                <td>
                                    1/11/2016
                                    <p class="m-0 text-muted font-14">Date</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect">Edit</button>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 m-b-15 header-title">Recent Activity Feed</h4>

                    <ol class="activity-feed mb-0">
                        <li class="feed-item">
                            <span class="date">Sep 25</span>
                            <span class="activity-text">Responded to need “Volunteer Activities”</span>
                        </li>

                        <li class="feed-item">
                            <span class="date">Sep 24</span>
                            <span class="activity-text">Added an interest “Volunteer Activities”</span>
                        </li>
                        <li class="feed-item">
                            <span class="date">Sep 23</span>
                            <span class="activity-text">Joined the group “Boardsmanship Forum”</span>
                        </li>
                        <li class="feed-item">
                            <span class="date">Sep 21</span>
                            <span class="activity-text">Responded to need “In-Kind Opportunity”</span>
                        </li>
                        <li class="feed-item">
                            <span class="date">Sep 18</span>
                            <span class="activity-text">Created need “Volunteer Activities”</span>
                        </li>
                        <li class="feed-item">
                            <span class="date">Sep 17</span>
                            <span class="activity-text">Attending the event “Some New Event”. Responded to needed.</span>
                        </li>
                        <li class="feed-item pb-1">
                                                    <span class="activity-text">
                                                        <a href="#" class="text-primary">More Activities</a>
                                                    </span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>


    </div>
@endsection