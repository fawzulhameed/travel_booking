<link rel="stylesheet" href="<?php echo $theme_url; ?>assets/css/travelport.css" />
<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->
<div class="container">
    <div class="acc-details__description">
        <div class="description">
            <div class="description__header">
                <div class="description__title text-700 c-very-dark-grey">
                    <span class="h2 strong"><?=$hotelDetail->AggregatorHotelDetails->HotelProperty->Name?></span> 
                    <span class="go-right mob-fs10">
                    <?php for($star = 0; $star < $hotelSearch->HotelProperty->HotelRating->Rating; $star++): ?>
                        <i class="star star icon-star-5"></i>
                    <?php endfor; ?>    
                        <!-- <i class="star star icon-star-5"></i>
                        <i class="star star icon-star-empty-2"></i>
                        <i class="star star icon-star-empty-2"></i>
                        <i class="star star icon-star-empty-2"></i> -->
                    </span>
                </div>
                <!-- <span class="h3 text-700">
                <span class="description__rating c-light-base">3.9</span>
                <span class="c-dark-blue">Very good</span>
                </span> -->
            </div>
            <div class="description__address c-text-grey text-xs-regular">
                <span class="description__address-text text-s-regular-sm">
                    <?=implode(' ', $hotelDetail->AggregatorHotelDetails->HotelProperty->PropertyAddress->Address)?>
                </span>
                <!-- <button class="description__btn c-light-blue text-s-medium text-700" type="button">View on map</button> -->
            </div>
        </div>
    </div>

    <div>
    <div class="col-md-8">
    <div class="row">
    <?php if(isset($hotelDetail->AggregatorHotelDetails->MediaItem)): ?>
    <div class="fotorama" data-nav="thumbs">
    <?php foreach($hotelDetail->AggregatorHotelDetails->MediaItem as $mediaItem): ?>
    <img src="<?=$mediaItem->url?>">
    <?php endforeach; ?>
    </div>
    <?php else: ?>
    <img src="<?php echo $theme_url; ?>assets/img/hotel.jpg">
    <?php endif; ?>
    </div>
    </div>
    <div class="col-md-4">
    <div class="row">
    <div id="map"></div>
    </div>
    </div>
    </div>


    <div class="clearfix"></div>

        <section>
            <div class="overview">
                <div class="overview__body">
                    <h4  class="overview__header h4">Overview</h4>
                    <p class="text-s-regular c-text-grey overview__content--less">
                        <?=$hotelSearch->PropertyDescription->_?>    
                    </p>
                </div>
            </div>
        </section>
        <section class="acc-details__rooms-section" id="rooms">
            <div class="acc-details__search-header">
                <div class="text-l c-dark-blue acc-details__search-header__title">
                    Rooms available
                </div>
            </div>
            <div class="availability-search">
                <div class="rooms-search">
                <div class="rooms-search__container details-page-view">
                <form autocomplete="off" name="hotelRateDetail" action="#" method="GET" role="search">
                    <div style="width:100%">
                        <div class="form-group col-md-3">
                            <label class="go-right"><?php echo trans('07');?></label>
                            <input type="text" placeholder="<?php echo trans('07'); ?>" name="checkin" value="<?=$checkinDate?>" class="form-control hpcheckin">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="go-right"><?php echo trans('09');?></label>
                            <input type="text" placeholder="<?php echo trans('09'); ?>" name="checkout" value="<?=$checkoutDate?>" class="form-control hpcheckout">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="go-right"><?php echo trans('010');?></label>
                            <select class="form-control fs12" name="adults">
                                <option value="1" <?=($adults == 1)?"selected":""?>>1</option>
                                <option value="2" <?=($adults == 2)?"selected":""?>>2</option>
                                <option value="3" <?=($adults == 3)?"selected":""?>>3</option>
                                <option value="4" <?=($adults == 4)?"selected":""?>>4</option>
                                <option value="5" <?=($adults == 5)?"selected":""?>>5</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-danger"><i class="icon_set_1_icon-66"></i> <?php echo trans('012'); ?></button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            </div>
            <div class="acc-details__search-results hotelRateDetail">
                <div class="room-cards">
                    <?php if(! empty($hotelDetail->AggregatorHotelDetails->HotelRateDetail) ): ?>
                        <?php if( ! is_array($hotelDetail->AggregatorHotelDetails->HotelRateDetail) ) {
                            $hotelDetail->AggregatorHotelDetails->HotelRateDetail = [$hotelDetail->AggregatorHotelDetails->HotelRateDetail];
                        } ?>
                        <?php foreach($hotelDetail->AggregatorHotelDetails->HotelRateDetail as $room): ?>
                        <div class="room-card">
                            <div class="room-card__container">
                                <!-- <div class="room-card__header">
                                    <p class="text-m c-dark-blue visible-xs">
                                        Classic Room
                                    </p>
                                    <p class="text-s-regular c-text-grey visible-xs">
                                        <span class="room-card__bed-type">1 king bed</span>
                                        <span>
                                        (max 4 guests)
                                        </span>
                                    </p>
                                </div> -->
                                <div class="room-card__body">
                                    <div class="room-card__content">
                                        <div class="room-card__image-box">
                                            <img class="room-card__image" src="<?php echo $theme_url; ?>assets/img/hotel.jpg">
                                        </div>
                                        <div class="room-card__content--left">
                                            <table>
                                                <tbody>
                                                    <?php $room->RoomRateDescription = (is_array($room->RoomRateDescription))?$room->RoomRateDescription:[$room->RoomRateDescription]; ?>
                                                    <?php foreach($room->RoomRateDescription as $roomDescription): ?>
                                                        <?php if($roomDescription->Name != 'Supplier Terms and Conditions'): ?>
                                                        <tr>
                                                            <td class="strong" style="padding-right:15px"><?=$roomDescription->Name?></td>
                                                            <td><?=(is_array($roomDescription->Text))?implode(' ', $roomDescription->Text):$roomDescription->Text?></td>
                                                        </tr>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                            <table>
                                                <div class="clearfix"></div>
                                                <span class="btn btn-warning btn-xs" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                    More Details
                                                </span>

                                                <div class="collapse" id="collapseExample">
                                                <div class="well">
                                                    <strong>Room Capicity:</strong> <?=$room->RoomCapacity->Capacity?><br/>
                                                    <strong>Supplemental Rate Info:</strong> <?=$room->SupplementalRateInfo?><br/>
                                                    <strong>Cancellation Policy:</strong> <?=$room->CancelInfo->CancellationPolicy?><br/>
                                                    <strong>Commission:</strong> <?=($room->Commission->Indicator)?"Rate is commissionable":"No Commission"?><br/>
                                                    <strong>CommissionAmount:</strong> <?=$room->Commission->CommissionAmount?><br/>
                                                    <strong>AcceptedPayment:</strong> <?=implode(', ', array_column($room->AcceptedPayment, 'PaymentCode'))?><br/>
                                                    <strong>Guarantee Type:</strong> <?=$room->GuaranteeInfo->GuaranteeType?><br/>
                                                </div>
                                                </div>
                                            </table>
                                            <!-- <p class="hidden-xs">
                                                <span class="text-m c-dark-blue room-card__room-name strong">
                                                <strong>Classic Room</strong>
                                                </span>
                                            </p>
                                            <p class="text-s-regular c-text-grey hidden-xs">
                                                <span class="room-card__bed-type"><?=$room->RoomCapacity->Capacity?></span>  
                                                <span>(max 4 guests)</span> 
                                            </p>
                                            <div class="cancellation-policy-badge__container">
                                                <div class="badge text-s-medium badge--success alert-success">
                                                    <span class="cancellation-policy-badge__label">
                                                    Free cancellation <i class="fa fa-info-circle"></i>
                                                    </span>
                                                </div>
                                            </div> -->

                                        </div>


                                        <div class="room-card__content--right">
                                            <div class="room-price__container">
                                                <span class="text-l c-dark-blue"><?=$room->Total?></span>
                                            </div>
                                            <span class="text-xs-regular c-text-grey">Total price including taxes and fees</span>
                                            <form action="<?=base_url('hotelport/checkout')?>" method="post">
                                            <input type="hidden" name="adults" value="<?=$adults?>"/>
                                                <input type="hidden" name="checkinDate" value="<?=$checkinDate?>"/>
                                                <input type="hidden" name="checkoutDate" value="<?=$checkoutDate?>"/>
                                                <input type="hidden" name="RatePlanType" value="<?=$room->RatePlanType?>"/>
                                                <input type="hidden" name="GuaranteeType" value="<?=$room->GuaranteeInfo->GuaranteeType?>"/>
                                                <br>
                                                <button class="core-btn-primary room-card__book-now-btn" type="submit">Book now</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="room-card__information">
                                    <div class="row top-xs">
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="box text-s-regular c-text-grey"><strong>1 King Bed</strong><br>431 sq feet (40 sq meters)<br><br><b>Layout</b> - Separate sitting area<br><b>Internet</b> - Free WiFi <br> <b>Entertainment</b> - 32-inch flat-screen TV with premium channels<br><b>Food &amp; Drink</b> - Coffee/tea maker, minibar, electric kettle, and 24-hour room service<br><b>Sleep</b> - Egyptian cotton linens, blackout drapes/curtains, and turndown service <br><b>Bathroom</b> - Private bathroom, bathrobes, and a shower/tub combination with a rainfall showerhead<br><b>Practical</b> - Safe, free newspaper, and phone; rollaway/extra beds and free cribs/infant beds available on request<br><b>Comfort</b> - Air conditioning and daily housekeeping<br>Smoking/Non Smoking, renovated in November 2016<br>Connecting/adjoining rooms can be requested, subject to availability <br>&nbsp;</div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="box">
                                                <span class="text-s-medium c-dark-blue">
                                                Room Details
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php if(array_key_exists('Amenities', $hotelSearch->HotelProperty)): ?>
        <section class="acc-details__facilities_section" id="facilities">
            <div>
                <h2 class="text-l c-dark-blue">Hotel facilities</h2>
                <div class="hotel-facilities">
                    <div class="hotel-facilities__container row">
                        <?php foreach($hotelSearch->HotelProperty->Amenities->Amenity as $amenity): ?>
                        <?php $facility = current(array_filter($facilities, function($facility) use($amenity) { return ($facility->code == $amenity->Code); })); ?>
                        <div class="col-md-3">
                            <div class="hotel-facility">
                                <i class="fa fa-check text-success"></i>
                                <span class="text-s-regular c-text-grey"><?=(!empty($facility))?$facility->description:$amenity->Code?></span>
                            </div>
                        </div>
                        <?php endforeach; ?> 
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <section class="acc-details__info-section">
            <div>
                <h2 class="text-l c-dark-blue">Other useful information</h2>
                <?php foreach($hotelDetail->AggregatorHotelDetails->HotelDetailItem as $item): ?>
                <div class="other-info__text">
                    <span class="text-s-medium c-dark-blue"><?=$item->Name?></span>
                    <div class="text-s-regular c-text-grey">
                        <p><?=$item->Text?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
</div>
<?php 
    $lat = $hotelDetail->AggregatorHotelDetails->HotelProperty->CoordinateLocation->latitude;
    $lng = $hotelDetail->AggregatorHotelDetails->HotelProperty->CoordinateLocation->longitude; 
?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0cI0f-PExxoanF3Jf9bT0Sb41Sym4ywk&callback=initMap"></script>
<script>
function initMap() {
    var uluru = {lat: <?=$lat?>, lng: <?=$lng?>};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: uluru
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
}

$(function(){
    $("[name=hotelRateDetail]").on('submit', function(e) {
        e.preventDefault();
        var payload = $(this).serialize();
        $.get('<?=base_url("hotelport/rateAndRule")?>', payload, function(resp) {
            $('.hotelRateDetail').empty().html(resp.body);
        });
    });
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    var checkin;
    var checkout;
    // Checkin time
    checkin = $('[name=hotelRateDetail] .hpcheckin').datepicker({
        format: 'yyyy-mm-dd',
        onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    })
    .on('changeDate', function(e){
        $(this).datepicker('hide');
        var newDate = new Date(e.date);
        checkout.setValue(newDate.setDate(newDate.getDate() + 1));
        $('[name=hotelRateDetail] .hpcheckout').focus();
    }).data('datepicker');

    // Checkout time
    checkout = $('[name=hotelRateDetail] .hpcheckout').datepicker({
        format: 'yyyy-mm-dd',
        onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(){
        $(this).datepicker('hide');
    }).data('datepicker');

    // Default fill up date
    if(checkin.element.val()) {
        checkin.setValue(checkin.element.val());
    }
    if(checkout.element.val()) {
        checkout.setValue(checkout.element.val());
    }
});
</script>