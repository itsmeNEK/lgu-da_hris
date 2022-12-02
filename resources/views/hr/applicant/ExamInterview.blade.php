<div class="container">
    <h6 class="text-muted mt-2 mb-4">
        In this Section is where to set the different exams and add scores as the basis for the ranking of applicants. <br>
        <p class="text-dark">NOTE: The rating range is between 1 and 10.</p>
    </h6>
    <div class="row justify-content-center">
        {{-- written --}}
        <div class="col-12 col-sm-6 col-md-4">
            <form action="" method="POST">
                @csrf
                <small id="written_exam_date" class="form-text text-muted">Please set the date of the exam first before adding rating.</small>
                <div class="input-group mb-3">
                    <div class="form-floating">
                        <input type="date" class="form-control" name="written_exam_date" id="written_exam_date"
                            aria-describedby="written_exam_date">
                        <label for="written_exam_date">Set Written Exam Date</label>
                    </div>
                    <button class="btn btn-outline-success" type="submit" >Set</button>
                </div>
                @error('written_exam_date')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </form>
            <form action="" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <div class="form-floating">
                        <input type="number" min="1" max="10" class="form-control" name="written_exam" id="written_exam"
                            aria-describedby="written_exam" placeholder="Written Exam">
                        <label for="written_exam"> Written Exam</label>
                    </div>
                    <button class="btn btn-outline-success" type="submit" >Add</button>
                </div>
                <small id="written_exam" class="form-text text-muted">The rating range is only 1 to 10</small>
                @error('written_exam')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </form>
        </div>

        {{-- oral --}}
        <div class="col-12 col-sm-6 col-md-4">
            <form action="" method="POST">
                @csrf
                <small id="oral_exam_date" class="form-text text-muted">Please set the date of the exam first before adding rating.</small>
                <div class="input-group mb-3">
                    <div class="form-floating">
                        <input type="date" class="form-control" name="oral_exam_date" id="oral_exam_date"
                            aria-describedby="oral_exam_date">
                        <label for="oral_exam_date">Set Oral Exam / Interview Date</label>
                    </div>
                    <button class="btn btn-outline-success" type="submit" >Set</button>
                </div>
                @error('oral_exam_date')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </form>
            <form action="" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <div class="form-floating">
                        <input type="number" min="1" max="10" class="form-control" name="oral_exam" id="oral_exam"
                            aria-describedby="oral_exam" placeholder="Oral Exam Rating">
                        <label for="oral_exam">Set Oral Exam Rate</label>
                    </div>
                    <button class="btn btn-outline-success" type="submit" >Add</button>
                </div>
                <small id="oral_exam" class="form-text text-muted">The rating range is only 1 to 10</small>
                @error('oral_exam')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </form>
        </div>

        {{-- written --}}
        <div class="col-12 col-sm-6 col-md-4">
            <form action="" method="POST">
                @csrf
                <small id="written_exam" class="form-text text-muted">&nbsp;</small>
                <div class="input-group mb-3">
                    <div class="form-floating">
                        <input type="number" min="1" max="10" class="form-control" name="background" id="background"
                            aria-describedby="background" placeholder="Background Investigation">
                        <label for="background">Background Investigation</label>
                    </div>
                    <button class="btn btn-outline-success" type="submit" >Set</button>
                </div>
                <small id="background" class="form-text text-muted">The rating range is only 1 to 10</small>
                @error('background')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </form>
        </div>

    </div>
</div>
