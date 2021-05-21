<div style="text-align:center;">
    <form action="/submit" method="post">
        @csrf

        <!-- Hidden -->
        <input type="hidden" id="catiptcpy" name="catiptcpy" required>
        <!-- Hidden ends -->

        <div class="catformele catform">
            <h1><b>Details</b></h1>
        </div>

        <!-- Category 1 Questions -->
        <div id="catform1" class="catform">
            <label for="c1a1">Which category do you need?</label><br>
            <textarea class="catformq" name="c1a1" id="c1a1" cols="150" rows="3" placeholder="CAT 6 / CAT 7 / Others"></textarea class="catformq"><br><br>
            
            <label for="c1a2">How long do you need the wire to be?</label><br>
            <textarea class="catformq" name="c1a2" id="c1a2" cols="150" rows="3" placeholder="0.5m / 1.0m / 2.0m / Others"></textarea class="catformq"><br><br>
            
            <label for="c1a3">What is the connection for?</label><br>
            <textarea class="catformq" name="c1a3" id="c1a3" cols="150" rows="3"></textarea class="catformq"><br><br>
        </div>

        <!-- Category 2 Questions -->
        <div id="catform2" class="catform">
            <label for="c2a1">Question 1: Was pitted against the socially liberal Warsaw</label><br>
            <textarea class="catformq" name="c2a1" id="c2a1" cols="150" rows="3" placeholder="relocation"></textarea class="catformq"><br><br>

            <label for="c2a2">Question 2: As a result, the albatross data had unintentionally revealed</label><br>
            <textarea class="catformq" name="c2a2" id="c2a2" cols="150" rows="3" placeholder="Question 2"></textarea class="catformq"><br><br>

            <label for="c2a3">Question 3: Human patrol boat being able to cover enough area to efficiently track</label><br>
            <textarea class="catformq" name="c2a3" id="c2a3" cols="150" rows="3" placeholder="Question 3"></textarea class="catformq"><br><br>
        </div>

        <!-- Category 3 Questions -->
        <div id="catform3" class="catform">
            <label for="c3a1">Question 1: Pollster Ipsos said had a margin of error of two</label><br>
            <textarea class="catformq" name="c3a1" id="c3a1" cols="150" rows="3" placeholder="printer lan connection"></textarea class="catformq"><br><br>

            <label for="c3a2">Question 2: Results are expected later on Monday it looks</label><br>
            <textarea class="catformq" name="c3a2" id="c3a2" cols="150" rows="3" placeholder="Question 2"></textarea class="catformq"><br><br>

            <label for="c3a3">Question 3: While a third showed 51% percent with</label><br>
            <textarea class="catformq" name="c3a3" id="c3a3" cols="150" rows="3" placeholder="Question 3"></textarea class="catformq"><br><br>
        </div>

        <!-- Category 4 Questions -->
        <div id="catform4" class="catform">
            <label for="c4a1">Question 1: Has probably never been so close in Polish history</label><br>
            <textarea class="catformq" name="c4a1" id="c4a1" cols="150" rows="3" placeholder="office relocation"></textarea class="catformq"><br><br>

            <label for="c4a2">Question 2: Polish voters would never have another chance to change Poland's direction</label><br>
            <textarea class="catformq" name="c4a2" id="c4a2" cols="150" rows="3" placeholder="Question 2"></textarea class="catformq"><br><br>

            <label for="c4a3">Question 3: Widespread support in rural areas and the east of the country</label><br>
            <textarea class="catformq" name="c4a3" id="c4a3" cols="150" rows="3" placeholder="Question 3"></textarea class="catformq"><br><br>
        </div>

        <!-- Category 5 Questions -->
        <div id="catform5" class="catform">
            <label for="c5a1">Question 1: Many countries are registering thousands of cases a day two seems</label><br>
            <textarea class="catformq" name="c5a1" id="c5a1" cols="150" rows="3" placeholder="new office"></textarea class="catformq"><br><br>

            <label for="c5a2">Question 2: Until that point, New Zealand had gone 24 days without a</label><br>
            <textarea class="catformq" name="c5a2" id="c5a2" cols="150" rows="3" placeholder="Question 2"></textarea class="catformq"><br><br>

            <label for="c5a3">Question 3: Were no reported cases in New Zealand, but the next day, the country began banning</label><br>
            <textarea class="catformq" name="c5a3" id="c5a3" cols="150" rows="3" placeholder="Question 3"></textarea class="catformq"><br><br>
        </div>

        <!-- Default Questions -->
        <div id="catformdef" class="catform">
            <label for="c0a1">Question 1: And restrictions placed on anyone arriving from South Korea</label><br>
            <textarea class="catformq" name="c0a1" id="c0a1" cols="150" rows="3" placeholder="customised"></textarea class="catformq"><br><br>

            <label for="c0a2">Question 2: At the time allowed them to basically stop the influx and stop the community</label><br>
            <textarea class="catformq" name="c0a2" id="c0a2" cols="150" rows="3" placeholder="Question 2"></textarea class="catformq"><br><br>
        </div>

        <!-- Category Not Found -->
        <div id="catformnf" class="catform">
            <p>The category does not exist. Please click "+" to add it.</p>
        </div>

        <div class="textCenter catformele catform">
            <button type="submit" id="catformbutton" class="btn" style="float:center">Submit</button>
        </div>

    </form>

    <div style="width:100%; height: 1cm;"></div>
</div>