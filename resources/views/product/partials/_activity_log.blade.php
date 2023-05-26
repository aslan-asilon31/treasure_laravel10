    <?php
        $user2 = 'aslansupervisor';
        $user1 = 'aslansuperadmin';
        $user3 = 'aslanadmin';
        $user4 = 'aslanmerchant';
        $user5 = 'aslanproductmanager';
        $user6 = 'aslanmarketingteam';
    ?>

  
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Product Activity Log </h1>
        <a href="" class="btn m-2 btn-warning" style="color:white;"><i class="fa fa-file-excel"></i></a>
        <a href="" class="btn m-2 btn-danger"><i class="fa fa-file-pdf"></i></a>
        <a href="" class="btn m-2 btn-info"><i class="fa fa-file-csv"></i></a>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body" style="">
    <ol class="activity-feed">

        @foreach ($productActivities as $productActivity)
        <li class="feed-item">
            <time class="date" datetime="9-25">{{ $productActivity->created_at }} | User : 
                @if($productActivity->causer_id == 1)
                {{ $user1 }} (user id : 1)
                @elseif($productActivity->causer_id == 2)
                {{ $user2 }} (user id : 2)
                @elseif($productActivity->causer_id == 3)
                {{ $user3 }} (user id : 3)
                @elseif($productActivity->causer_id == 4)
                {{ $user4 }} (user id : 4)
                @elseif($productActivity->causer_id == 5)
                {{ $user5 }} (user id : 5)
                @elseif($productActivity->causer_id == 6)
                {{ $user6 }} (user id : 6)
                @endif
            </time>
            <span class="text"> 
                @if($productActivity->description == 'created')
                    <span class="badge badge-primary">created</span>
                @elseif($productActivity->description == 'updated')
                    <span class="badge badge-warning">updated</span>
                @elseif($productActivity->description == 'deleted')
                    <span class="badge badge-danger">deleted</span>
                @else
                    <span class="badge badge-info">{{ $productActivity->description }}</span>
                @endif
                
                {{ $productActivity->subject_type }} 
                <p >(product id :{{ $productActivity->subject_id }})</p>
            </span>
        </li>
        @endforeach
     
    </ol>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
    </div>
    </div>
</div>
</div>