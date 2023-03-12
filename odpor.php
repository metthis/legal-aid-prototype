<html lang="cs">

<head>
    <meta charset="UTF-8">
    <title>Odpor</title>
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
</head>

<body>

<h1>Odpor</h1>

<h2>proti platebnímu rozkazu nebo elektronickému platebnímu rozkazu</h2>

<h2 class="disclaimer">Tato stránka slouží pro testování. Nejedná se o právní rady. Obsažené informace nikam nešiřte.</h2>

<h3>Co se stane, když podám odpor?</h3>
<div class="after_h">
    <h4>1. Odporem zrušíte platební rozkaz</h4>
    <div class="after_h">
        <p>Odporem dáváte soudu najevo, že nesouhlasíte s platebním rozkazem. Nemusíte soudu nijak vysvětlovat, proč odpor podáváte.</p>
        <p>Nebudete muset hned platit, ale rozběhne se klasický soudní spor.</p>
        <p>Důvody, proč podat odpor, mohou být různé. Pokud jsme vám doporučili podat odpor, udělejte to. Ale nezapomeňte, že odporem to nekončí. Řiďte se radami na stránce o <a href="epr.php" target="_blank">platebním rozkazu a elektronickém platebním rozkazu</a>.</p>
    </div>

    <h4>2. Pozor na výzvu k vyjádření!</h4>
    <div class="after_h">
        <p class="bold">Znovu si pročtěte platební rozkaz. Soud vás možná vyzval, abyste se po podání odporu vyjádřili k žalobě.</p>
        <p>Pokud je to váš případ, a vy se nevyjádříte, soud automaticky vyhoví žalobci a vy stejně prohrajete.</p>
        <p><b>Na vyjádření máte alespoň 30 dní od posledního dne, kdy jste ještě mohli podat odpor.</b> Tuto lhůtu si pečlivě hlídejte.</p>
        <p>Máte podle našich rad počkat na žalobce, aby např. vzal žalobu zpět, žalobu změnil nebo soudu navrhl smír? Žalobce to pořád neudělal? Zbývá vám na vyjádření už jen 14 dní, nebo méně?</p>
        <p>Rozhodněte se, jestli se vám vyplatí najít si advokáta, který by vám pomohl. Pokud ano, <b>jděte rychle za advokátem</b>. Pokud ne, raději zaplaťte vše, co po vás žalobce žádá.</p>
        <p>Třetí možností je, že se se žalobcem budete soudit sami, bez advokáta. To vám určitě nedoporučujeme.</p>
    </div>
</div>

<h3>Jak mám odpor napsat?</h3>

<p>Psaní vám můžeme usnadnit. Můžete si stáhnout hotový odpor, který jen podepíšete a dodáte soudu.</p>
<p>Pečlivě vyplňte tyto údaje a klikněte na tlačítko <i>Stáhnout odpor.</i></p>

<form id="odpor" method="post" target="_blank" action="src/PDF/FormToPrint.php">
    <table>
        <tr>
            <th colspan="2">O vás:</th>
        </tr>
        <tr>
            <td class="leftc">Jméno a příjmení</td>
            <td>
                <input name="jmeno" type="text" />
            </td>
        </tr>
        <tr>
            <td class="leftc">Datum narození</td>
            <td>
                <input name="datum_narozeni" type="date" />
            </td>
        </tr>
        <tr>
            <td class="leftc">Adresa, na které bydlíte</td>
            <td>
                <input name="bydliste" type="text" />
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <th colspan="2">O platebním rozkazu:</th>
        </tr>
        <tr>
            <td class="leftc">Přišel vám platební rozkaz, nebo elektronický platební rozkaz?</td>
            <td>
                <input name="druh_pr" id="druh_pr_pr" type="radio" value="pr" />
                <label for="druh_pr_pr">Platební rozkaz</label>
                <input name="druh_pr" id="druh_pr_epr" type="radio" value="epr" />
                <label for="druh_pr_epr">Elektronický platební rozkaz</label>
            </td>
        <tr>
            <td class="leftc">Od kterého soudu vám platební rozkaz přišel?</td>
            <td>
                <input name="adresat" type="text" />
            </td>
        </tr>
        <tr>
            <td class="leftc">Kdy vám byl platební rozkaz doručen?</td>
            <td>
                <input name="datum_doruceni" type="date" />
            </td>
        </tr>
        <tr>
            <td class="leftc">V pravém horním rohu je uvedeno <i>č. j.</i>, tzv. <i>číslo jednací</i>. Začíná číslem/zkratkou <i>EPR</i>. Jak zní?</td>
            <td>
                <input name="cislo_jednaci" type="text" />
            </td>
        </tr>
        <tr>
            <td class="leftc">Datum, kdy chcete odpor podat soudu</td>
            <td>
                <input name="datum_podani" type="date" />
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td colspan="2" class="bold">Vyplnili jste všechny údaje správně? Dejte pozor hlavně na číslo jednací.</td>
        </tr>
        <tr>
            <td colspan="2" class="center">
                <button type="submit" class="button" form="odpor">Stáhnout odpor</button>
            </td>
        </tr>
    </table>
</form>

<h3>Co mám s hotovým odporem dělat?</h3>

<p>Odpor musíte u soudu včas <i>podat</i>. Máte na to 15 dní ode dne, kdy vám byl platební rozkaz doručen.</p>
<p>Je několik možností, jak na to. Vyberte si jednu:</p>

<button type="button" class="collapsible">Pomocí datové schránky</button>
<div class="content">
    <p>Tato možnost funguje, jen když máte zřízenou datovou schránku.</p>
    <p>Odpor, který jste si stáhli, ze své datové schránky odešlete soudu, od kterého vám přišel platební rozkaz.</p>
    <p>Odpor jste podali včas, pokud byl <i>dodán</i> do datové schránky soudu nejpozději patnáctý den po dni, kdy vám byl doručen platební rozkaz.</p>
    <p>Stáhněte si doručenku datové zprávy, kterou jste odpor odeslali. Doručenku si uložte. Je v ní uvedeno, kdy přesně byl odpor dodán soudu. Kdyby o tom vyvstaly pochybnosti, může vám posloužit jako důkaz.</p>
</div>

<button type="button" class="collapsible">Poštou</button>
<div class="content">
    <p>Na začátku platebního rozkazu si přečtěte, kolik je celkem žalobců a kolik je celkem žalovaných (včetně vás). Odpor vytiskněte tolikrát, aby každý dostal jeden, a k tomu ještě jeden navíc.</p>
    <p>Každý vytisknutý odpor podepište na podpisovém řádku, který najdete na konci odporu.</p>
    <p>Všechny podepsané papíry dejte do obálky. Zajděte na poštu a obálku odešlete na adresu soudu, který vám poslal platební rozkaz. Adresu si můžete přečíst na začátku odporu, hned pod názvem soudu.</p>
    <p>Uložte si podací lístek. Je ně něm uvedeno, kdy jste odpor odeslali. Kdyby o tom vyvstaly pochybnosti, může vám posloužit jako důkaz.</p>
    <p>Odpor jste podali včas, pokud jste ho odeslali nejpozději patnáctý den po dni, kdy vám byl doručen platební rozkaz.</p>
</div>

<button type="button" class="collapsible">Osobně na podatelně soudu</button>
<div class="content">
    <p>Na začátku platebního rozkazu si přečtěte, kolik je celkem žalobců a kolik je celkem žalovaných (včetně vás). Odpor vytiskněte tolikrát, aby každý dostal jeden, a k tomu ještě dva navíc.</p>
    <p>Každý vytisknutý odpor podepište na podpisovém řádku, který najdete na konci odporu.</p>
    <p>Všechny podepsané papíry doneste na podatelnu soudu, který vám poslal platební rozkaz. Adresu si můžete přečíst na začátku odporu, hned pod názvem soudu. Na podatelně řekněte, že jste přišli podat odpor, a papíry jim předejte.</p>
    <p>Požádejte, aby vám na jeden z papírů dali razítko s datem. Tento papír si uložte. Je ně něm uvedeno, kdy jste odpor podali. Kdyby o tom vyvstaly pochybnosti, může vám posloužit jako důkaz.</p>
    <p>Odpor jste podali včas, pokud jste ho na podatelně soudu podali nejpozději patnáctý den po dni, kdy vám byl doručen platební rozkaz.</p>
</div>

<button type="button" class="collapsible">Emailem</button>
<div class="content">
    <p class="bold">Tato možnost se vám bude hodit, když už vám pro podání odporu nezbývá moc času. Email ale nestačí! Do 3 dní po odeslání emailu budete muset odpor podat jedním ze způsobů, které jsou uvedeny výše.</p>
    <p>Odpor, který jste si stáhli, odešlete na email soudu, od kterého vám přišel platební rozkaz.</p>
    <p>Najděte si  <a href="https://justice.cz/soudy" target="_blank">soud, kterému chcete odpor poslat</a>. Každý soud má v liště nalevo záložku <i>Kontakty</i>. V ní byste měli najít emailovou adresu soudu. Adresa je nejspíš ve formátu <i>...@...justice.cz.</i></p>
    <p>Email si uložte. Je v něm uvedeno, kdy jste ho odeslali. Kdyby o tom vyvstaly pochybnosti, může vám posloužit jako důkaz.</p>
    <p>Odpor jste podali včas, pokud byl doručen na email soudu nejpozději patnáctý den po dni, kdy vám byl doručen platební rozkaz. Proto si dejte pozor na to, jestli jste odpor odeslali na správnou emailovou adresu.</p>
    <p><b>Odesláním odporu emailem jste získali trochu času, ale ještě jste neskončili!</b> Nyní máte 3 dny na to, abyste odpor podali znovu jedním ze způsobů, které jsou uvedeny výše (pomocí datové schránky, poštou, nebo osobně na podatelně soudu). Přečtěte si, jak na to. Kdybyste zůstali jen u emailu, soud by k odporu vůbec nepřihlížel.</p>
</div>

<button type="button" class="collapsible">Na soudu ústně do protokolu</button>
<div class="content">
    <p><b>Tato možnost je nejméně spolehlivá. Snažte se raději využít jednu z možností, které jsou uvedeny výše.</b> Tato možnost vám ale může pomoci, pokud odpor nemůžete vytisknout, ani sami napsat.</p>
    <p>Zajděte na podatelnu soudu, který vám poslal platební rozkaz. Adresu soudu si můžete přečíst na začátku odporu, který jste si stáhli, hned pod názvem soudu.</p>
    <p>Vezměte si s sebou:</p>
    <ul>
        <li>Platební rozkaz</li>
        <li>Občanský průkaz, cestovní pas nebo jiný průkaz totožnosti</li>
    </ul>
    <p>Na podatelně řekněte, že byste chtěli podat odpor, a to <i>ústně do protokolu.</i></p>
    <p>Až se vás ujme úředník nebo soudce, musíte mu říct následující:</p>
    <ul>
        <li>Vaše jméno</li>
        <li>Vaše datum narození</li>
        <li>Adresu vašeho bydliště</li>
        <li>Že vám od tohoto soudu přišel platební rozkaz</li>
        <li><i>Číslo jednací</i>, které je uvedeno v pravém horním rohu platebního rozkazu</li>
        <li>Že proti platebnímu rozkazu podáváte odpor</li>
    </ul>
    <p>Až s vámi sepíše protokol, požádejte o kopii protokolu. Ujistěte se, že je na protokolu správné datum a že je v protokolu uvedeno všechno důležité, co jste řekli. Protokol si uložte. Kdyby vyvstaly pochybnosti o tom, kdy jste odpor podali, protokol vám poslouží jako důkaz.</p>
    <p>Odpor jste podali včas, pokud s vámi protokol sepsali nejpozději patnáctý den po dni, kdy vám byl doručen platební rozkaz.</p>
</div>

<div class="footer">
    Ozvěte se nám na <a href="mailto:obalka@spruhem.cz">obalka@spruhem.cz</a>
</div>

<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
</script>

</body>

</html>
