<?php __header__(); ?>
<div class="container-fluid">

    <div class="jumbotron">
        <h3>The big knowledge test!</h3>
        <p>How good is your general knowledge?</p>
    </div>

    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#quiz" role="tab" aria-controls="quiz"
                aria-selected="true">Questions</a>
        </li>

    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="quiz" role="tabpanel" aria-labelledby="quiz-tab">
            <div class="card border-info mb-4 ">

                <div class="d-flex justify-content-between align-items-center card-header " id="h1">
                    <span>Question 1</span>
                    <button type="button" data-toggle="collapse" data-target="#q1" aria-expanded="false"
                        aria-controls="q1" class="btn btn-light"><svg width="1em" height="1em" viewBox="0 0 16 16"
                            class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>
                </div>
                <div id="q1" class="collapse show" aria-labelledby="h1">
                    <div class="card-body">
                        <p>Philology is the</p>

                        <div class="answer">
                            <input type="text" class="form-control" name="answer[]" placeholder="Write your Answer">
                        </div>



                    </div>

                </div>
            </div>

            <div class="card border-info mb-4">

                <div class="d-flex justify-content-between align-items-center card-header " id="h2">
                    <span>Question 2</span>
                    <button type="button" data-toggle="collapse" data-target="#q2" aria-expanded="false"
                        aria-controls="q2" class="btn btn-light"><svg width="1em" height="1em" viewBox="0 0 16 16"
                            class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>
                </div>
                <div id="q2" class="collapse" aria-labelledby="h2">
                    <div class="card-body">
                        <p>Oscar Awards are conferred annually by</p>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q2" id="q2_r1" value="r1">
                            <label class="form-check-label" for="q2_r1">
                                Academy of Motion Pictures, arts and sciences, USA
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q2" id="q2_r2" value="r2">
                            <label class="form-check-label" for="q2_r2">
                                Government of United States
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q2" id="q2_r3" value="r3">
                            <label class="form-check-label" for="q2_r3">
                                Hollywood Foreign Press Association
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q2" id="q2_r4" value="r4">
                            <label class="form-check-label" for="q2_r4">
                                None of the above
                            </label>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card border-info mb-4">

                <div class="d-flex justify-content-between align-items-center card-header " id="h3">
                    <span>Question 3</span>
                    <button type="button" data-toggle="collapse" data-target="#q3" aria-expanded="false"
                        aria-controls="q3" class="btn btn-light"><svg width="1em" height="1em" viewBox="0 0 16 16"
                            class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>
                </div>
                <div id="q3" class="collapse" aria-labelledby="h3">
                    <div class="card-body">
                        <p>Robert Koch worked on</p>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q3" id="q3_r1" value="r1">
                            <label class="form-check-label" for="q3_r1">
                                tuberculosis
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q3" id="q2_r2" value="r2">
                            <label class="form-check-label" for="q3_r2">
                                cholera
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q3" id="q3_r3" value="r3">
                            <label class="form-check-label" for="q3_r3">
                                malaria
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q3" id="q3_r4" value="r4">
                            <label class="form-check-label" for="q3_r4">
                                diabetes
                            </label>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card border-info mb-4">

                <div class="d-flex justify-content-between align-items-center card-header " id="h4">
                    <span>Question 4</span>
                    <button type="button" data-toggle="collapse" data-target="#q4" aria-expanded="false"
                        aria-controls="q4" class="btn btn-light"><svg width="1em" height="1em" viewBox="0 0 16 16"
                            class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>
                </div>
                <div id="q4" class="collapse" aria-labelledby="h4">
                    <div class="card-body">
                        <p>Richter scale is used for measuring</p>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q4" id="q4_r1" value="r1">
                            <label class="form-check-label" for="q4_r1">
                                density of liquid
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q4" id="q2_r2" value="r2">
                            <label class="form-check-label" for="q4_r2">
                                intensity of earthquakes
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q4" id="q4_r3" value="r3">
                            <label class="form-check-label" for="q4_r3">
                                velocity of wind
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q4" id="q4_r4" value="r4">
                            <label class="form-check-label" for="q4_r4">
                                humidity of air
                            </label>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card border-info mb-4">

                <div class="d-flex justify-content-between align-items-center card-header " id="h5">
                    <span>Question 5</span>
                    <button type="button" data-toggle="collapse" data-target="#q5" aria-expanded="false"
                        aria-controls="q5" class="btn btn-light"><svg width="1em" height="1em" viewBox="0 0 16 16"
                            class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>
                </div>
                <div id="q5" class="collapse" aria-labelledby="h5">
                    <div class="card-body">
                        <p>Prince Charles and Princess Diana of Britain announce their separation in</p>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q5" id="q5_r1" value="r1">
                            <label class="form-check-label" for="q5_r1">
                                1990
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q5" id="q5_r2" value="r2">
                            <label class="form-check-label" for="q5_r2">
                                1991
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q5" id="q5_r3" value="r3">
                            <label class="form-check-label" for="q5_r3">
                                1996
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="q5" id="q4_r4" value="r4">
                            <label class="form-check-label" for="q5_r4">
                                1997
                            </label>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php __footer__(); ?>