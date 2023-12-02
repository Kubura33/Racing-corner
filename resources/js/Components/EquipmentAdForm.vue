<template>
    <div style="display: flex;flex-direction: row;align-items: center;justify-content: center;justify-items: center; width: 100%;padding: 100px;">


        <div class="signupSection">
            <div class="info">
                <div class="icon" @click="emitAction">
                    <div class="arrow"></div>
                </div>
                <img src="/images/kaciga.jpg" alt="" style="width: 100%;height: 100%">
            </div>
            <form  method="POST" class="signupForm" name="signupform">
                <h2>Oglas za opremu</h2>
                <ul class="noBullet">
                    <li>
                        <label for="ime"></label>
                        <input type="text" class="inputFields" id="ime" name="ime" placeholder="Ime" value="" oninput="return userNameValidation(this.value)" required/>
                    </li>

                    <li>
                        <label for="opis"></label>
                        <resize-textarea class="inputFields" name="opis" id="opis" placeholder="Opis"></resize-textarea>
                    </li>
                    <li>
                        <label for="cena"></label>
                        <input type="text" class="inputFields" id="cena" name="cena" placeholder="Cena(€)" value="" required/>
                    </li>

                    <li style="display: flex; flex-direction: row; justify-items: center;align-items: center;justify-content: center; gap:0.4rem; margin-top: 30px;">
                        <label for="">Korisceno? </label>
                        <label for="da">Da</label>
                        <input type="radio" id="da" value="1" name="used" checked>
                        <label for="ne">Ne</label>
                        <input type="radio" id="ne" value="0" name="used">
                    </li>
                    <li style="display: flex; flex-direction: row; justify-items: center;align-items: center;justify-content: center; gap:0.4rem; margin-top: 30px;">
                        <label for="">Fiksna cena? </label>
                        <label for="da">Da</label>
                        <input type="radio" id="da" value="1" name="fixed" checked>
                        <label for="ne">Ne</label>
                        <input type="radio" id="ne" value="0" name="fixed">
                    </li>
                    <li id="center-btn" style="margin-top: 50px;">
                        <input type="submit" id="join-btn" name="join" alt="Join" value="Kreiraj oglas">
                    </li>
                </ul>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    methods: {
        emitAction() {
            this.$emit('arrow-clicked');
        }
    }
};
</script>
