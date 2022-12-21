<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-form-{{ $item->id }}">
    <i class="fa-solid fa-pen-to-square"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="edit-form-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('hr.surveyForm.update', $item->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Question</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row justify-content-center">
                        <div class="col"></div>
                        <div class="col"></div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col">
                            <select class="form-select form-select-sm" name="question[]" id="question"
                                placeholder="Question">
                                <option hidden>Select question</option>
                                @forelse ($Leadership_Question as $item)
                                <option value="{{ $item->id }}">{{ $item->question }}</option> @empty<option
                                        selected>No
                                        question Yet</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cance</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
