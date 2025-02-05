 <form class="backend-form" wire:submit.prevent="save">
        <div class="main-form-content">
            <div class="main-form-group">
                <h2 class="form_title">Φόρμα αλλαγής φόρων & τελών.</h2>
                <p class="form-subtitle"> Εδώ αλλάζετε τους φόρους και τα τέλη που χρεώνεται ο πελάτης για κάθε κράτηση ή συναλλαγή! </p>

                <div class="input-group-block">
                        <label for="username" class="">ΦΠΑ% / VAT% </label>
                            <div class="input-inline-elements">
                                <span class="inline-label">%</span>
                                <input type="text" name="vat" id="vat" wire:model="vat" class="" placeholder="13">
                            </div>
                </div>
                <div class="input-group-block">
                    <label for="username" class="">Πράσινος Φόρος</label>
                    <div class="input-inline-elements">
                        <span class="inline-label">€</span>
                        <input type="text" name="green_tax" id="green_tax" wire:model="green_tax" class="" placeholder="13">
                    </div>
                </div>

                    <div class="input-group-block">
                        <label for="username" class="">Δημοτικός Φόρος </label>
                            <div class="input-inline-elements">
                                <span class="inline-label">%</span>
                                <input type="text" name="username" id="username" wire:model="city_tax" class="block flex-1 outline-none border-0 bg-transparent py-1.5 pl-1 text-gray-900 focus-within:ring-0 focus-within:outline-0 placeholder:text-gray-400 sm:text-sm sm:leading-6" placeholder="13">
                            </div>

                    </div>
            </div>



            <div class="horizontal_spacer">
                <h2 class="text-base font-semibold leading-7 text-red-500">Προσοχή!</h2>
                <p class="mt-1 text-sm leading-6 text-red-950">Πριν αποθηκέυσετε τις αλλαγές σας βεβαιωθείται ότι είναι σωστές!<br>
                Δέν υπάρχει δυνατότητα επιστροφής σε προηγούμενο στάδιο μετά την αποθήκυεση παραμόνο μέσω χειροκίνητης αλλαγής!
                </p>
            </div>
        </div>


            <button type="button" wire:click="cancel" class="text-sm font-semibold leading-6 text-red-600">Ακύρωση Αλλαγών</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Αποθήκευση Αλλαγών</button>

</form>

