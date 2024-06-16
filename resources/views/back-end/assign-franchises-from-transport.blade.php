<div class="card">
    <div class="card-body">
        <div class="card card-primary">
            <form action="/create-transport-franchise/{{ $tour_id }}" method="post" id="create-tour-form"
                enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-xm-12">
                            <div class="form-group" data-select2-id="1">
                                <label for="guide">Guiding Language</label>
                                <select class="form-control select2 " style="width: 100%;" data-select2-id="1"
                                    aria-hidden="true" onchange="getGuide(this)">
                                    <option value="">No Select</option>
                                    @foreach ($guide_language as $item)
                                        <option value="{{ $item->id }}">{{ $item->language }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-xm-12">
                            <div class="form-group" data-select2-id="2">
                                <label for="guide">Guide</label>
                                <select class="form-control select2" name="guide" style="width: 100%;"
                                    data-select2-id="2" aria-hidden="true">
                                    <option value="">No Select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xm-12">
                            <div class="form-group" data-select2-id="3">
                                <label for="vehical">Vehical Type</label>
                                <select class="form-control select2 " style="width: 100%;" data-select2-id="3"
                                    aria-hidden="true" onchange="getVehical(this)">
                                    <option value="">No Select</option>
                                    @foreach ($vehical_type as $item)
                                        <option value="{{ $item->id }}">{{ $item->vehical_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-xm-12">
                            <div class="form-group" data-select2-id="4">
                                <label for="vehical">Vehical</label>
                                <select class="form-control select2 " name="vehical" style="width: 100%;"
                                    data-select2-id="4" aria-hidden="true">
                                    <option value="">No Select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xm-12">
                            <div class="form-group" data-select2-id="5">
                                <label for="driver">Driver</label>
                                <select class="form-control select2 " name="driver" style="width: 100%;"
                                    data-select2-id="5" aria-hidden="true">
                                    <option value="">No Select</option>
                                    @foreach ($driver as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->full_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xm-12">
                            <label for="special_requirement">Special Requirement</label>
                            <textarea class="summernote" style="display: none;" name="special_requirement">
                                    {{-- {{ $tour_schedule->special_requirement }} --}}
                                </textarea>
                        </div>
                    </div>
                </div>
        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-primary float-right" value="Submit">
        </div>
        </form>
    </div>
</div>
</div>
