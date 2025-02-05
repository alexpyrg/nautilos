<div class="contact-us-container">

    <h1>{{ $translations['title'] }} </h1>
    <div class="info-container-flex">
        <div class="info-panel">
            <h3>{{ $translations['cretan_villa_hotel'] }}</h3>
            <span> {{ $translations['address'] }} </span>
            <span> {{ $translations['ierapetra_crete_greece'] }} </span>
            <span> {{ $translations['front_desk_hours'] }} </span>
            <span> {{ $translations['tel_center'] }} </span>
            <span> {{ $translations['hotel_email'] }} </span>
            <h3>{{ $translations['find_us_on'] }}</h3>
            <span class="icons"> <a href="https://www.instagram.com/cretan_villa_hotel/"><i class="fa-brands fa-instagram fa-xl"></i></a> <a href="https://www.facebook.com/Cretan.Villa.Hotel.Ierapetra"> <i class="fa-brands fa-facebook fa-xl"></i> </a> </span>
        </div>
        <div class="info-panel">
            <form class="contact-us-form" style="min-width: 100%; box-sizing: border-box; ">
                <div class="contact-us-form-group">
                    <label>{{ $translations['name'] }} </label>
                    <input  style="font-size: 20px; padding-block: .3rem;   font-family: 'Times New Roman', Times, serif, Tahoma, Arial;" wire:model="name">
                </div>
                <div class="contact-us-form-group">
                    <label>{{ $translations['email'] }}</label>
                    <input  style="font-size: 20px; padding-block: .3rem;  font-family: 'Times New Roman', Times, serif, Tahoma, Arial;" wire:model="email">
                </div >
                <div class="contact-us-form-group">
                <label>{{ $translations['telephone'] }}</label>
                <input  style="font-size: 20px; padding-block: .3rem; font-family: 'Times New Roman', Times, serif, Tahoma, Arial;" wire:model="Telephone">
                </div>
                <div class="contact-us-form-group">
                    <label>{{ $translations['message'] }} </label>
                    <textarea style="font-size: 20px; padding-block: .3rem;  font-family: 'Times New Roman', Times, serif, Tahoma, Arial;" wire:model="message" >
                    </textarea>
                </div>

                <div class="contact-us-form-group">
                    <br>
                    &nbsp;
                    <button type="submit" style=" font-size: 20px; cursor: pointer; padding-block: .3rem; border: 2px solid #6e6259; background-color: #9D968D; color: white;">
                        {{ $translations['submit'] }}
                    </button>
                </div>
            </form>
        </div>


    </div>
    <iframe height="400"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3267.8130776098606!2d25.740505999999993!3d35.011384000000014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1490796992c9712b%3A0xecc2a87124d4d09e!2sCretan+Villa+Hotel!5e0!3m2!1sen!2sgr!4v1431432861614"
            style="border:0; margin-right:auto; margin-left:auto;" width="100%">
    </iframe>
</div>
