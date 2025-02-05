<div class="mbfContainer">
    <form wire:submit.prevent='save' class="mainBackEndForm back-end-editor-form">
        @csrf
        <h2> Φόρμα αλλαγής προτύπων</h2>
        <div class="input-group-block">
            <label for="mail_title">
                Τίτλος:
            </label>
            <input type="text" name="mail_title" id="mail_title" wire:model='mail_title'>
            <br>
        </div>
            <div class="input-group-block">
                <label for="editor">
                    Περιεχόμενο:
                </label>
                <div id="editor">
                    {{ $email->content }}
                </div>
            </div>



    <button type="submit">Αποθήκευση προτύπου</button>



    </form>
</div>
