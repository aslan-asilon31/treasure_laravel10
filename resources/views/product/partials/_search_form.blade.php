    <!-- SEARCH -->
    <div class="card mb-3 card-outline card-danger collapsed-card bg-indigo" >
        <div class="card-header">
            <h3 class="card-title">Filter <br></h3>
            <div class="card-tools">
                <!-- Collapsß Button -->
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                
            </div>
            <p style="color:red;display:none;" class="info-limit" > <br> Limit digunakan untuk membatasi jumlah baris data yang akan di export maksimal 20.000 data </p>
        </div>

        <div class="card-body" >
            <form action="" method="get"  id="search-form">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-6">
                        <label for="id_member">Product ID</label>
                        <input type="tel" name="id_member" id="id_member" class="form-control mb-2" />

                        <label for="id_member">Name</label>
                        <input type="tel" name="name" id="name" class="form-control mb-2" />

                        <label for="desc_info">Category</label>
                        <select class="form-control" name="batch" id="batch">
                            <option value="">-- Select Category --</option>
                            {{-- @foreach ($datasales as $b)
                                <option value="{{ $b->batch }}">{{ $b->batch }}</option>
                            @endforeach --}}
                        </select>

                        <label for="desc_info">Category Detail</label>
                        <select class="form-control" name="batch" id="batch">
                            <option value="">-- Select Category Detail --</option>
                            {{-- @foreach ($datasales as $b)
                                <option value="{{ $b->batch }}">{{ $b->batch }}</option>
                            @endforeach --}}
                        </select>



                    </div>
                    <div class="col-md-6">
                        <label for="source">Color</label>
                        <input type="text" name="source" id="source" class="form-control mb-2" />

                        <label for="recipient">Status</label>
                        <input type="text" name="recipient" id="recipient" class="form-control mb-2" />

                        <label >Limit</label><br/>
                        {{-- <select name="" class="form-control" id="" required>
                            <option value="">Select Limit</option>
                            <option value="10">10</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="300">300</option>
                            <option value="400">400</option>
                            <option value="500">500</option>
                            <option value="1000">1000</option>
                            <option value="5000">5000</option>
                            <option value="10000">10,000</option>
                            <option value="20000">20,000</option>
                        </select> --}}

                        <label for="no_hp">Date</label>
                        <input type="tel" name="tanggal" id="tanggal" class="form-control mb-2" />

                    </div>
                </div>
                <span id="data_reference_download"></span>
                <input id="reference_download" type="hidden" name="reference_download" value="">
            {{-- </form> --}}
        </div>

        <div class="card-footer">
            <div class="float-right">
                <a type="button" class="btn btn-flat bg-primary" id="search"><i class="fas fa-search"></i> SEARCH</a>
                <a type="button" id="reset" class="btn btn-flat bg-secondary  btn-reset"><i class="fas fa-undo-alt"></i> Reset</a>
            </div>
        </div>
    </div>
    <!-- END SEARCH -->