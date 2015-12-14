Hra, kde získavaš suroviny, vyrábaš z nich komponenty a počítače

# TODO: popis co ta hra vubec je a jak ovlivni antre

# Workflow (obsolete, needs update):
# Crafting
Cílem craftingu je složit sestavu. Každá sestava se musí skládat z těchto druhů komponent:
  - [CPU](CPU)
  - [RAM](RAM)
  - [GPU](GPU)
  - [Storage](Storage)
  - [Power source](PSU)
  - [Motherboard](Motherboard)

Od každého druhu komponenty bude několik reálných komponent, které budou potřebovat určitý počet součástek, ale všechny komponenty stejného druhu budou ze stejných součástek, jen jiný počet.

  Názvosloví (příklad):
  - Komponenta - i7 4770K
  - Druh komponenty - CPU
  - Součástka - L3 Cache
  - Surovina - Křemík

  Průběh Craftingu (4 tiery):
  1. Surovina - křemík, zlato, ...
    - Surovina se pošle do externí firmy, která z ní za určitý čas (zadarmo) vyrobí součástku
  2. Součástka - jádro, ...
    - Podle toho, jaké komponenty má hráč vyzkoumané, může složit součástky do komponenty
  3. Komponenta - i7, ...
    - Komponenty může hráč hned a zdarma skládat do sestav a sestavy rozebírat
  4. Sestava - sestavy nebudou mít názvy

# Výzkum
  Cílem výzkumu je odemčít další tier. Do výzkumu můžou přispívat všechny složené sestavy, podobně jako do konečných bodů. Přiklad (*hodnoty a názvy pouze pro ilustraci*):
  Na začátku, přestože může mít hráč součástky na to, aby postavil i ten nejlepší CPU, může postavit pouze pentium. Z něj pak sestaví sestavu, která má výkon 10. Na i3 1st gen je potreba 1000 bodů. Tuto sestavu nastaví, aby 50% šlo do výherních bodů a 50% na výzkum. Ve výzkumu do fronty vloží i3 1st gen. 1000/(10*0.5) sekund po tom se mu odemče možnost craftit i3 1st gen.

# Cíl hry
Cilem hry je co nejvíc přispět do jednoho z [Distributed Computing](http://boinc.berkeley.edu/projects.php) projektů (jeden vybereme). Na konci hry se sestaví pořadí od největšího podle toho, kolik výkonu propůjčil + kolik peněz mu zbylo (všechny se pošlou tomu projektu).
Do projektu bude přispívat každá složená sestava každou sekundu svůj sekundový výkon, který bude určený podle komponent. Zároveň bude možné nastavit, kolik % výkonu půjde na projekt a kolik % na [výzkum](research).

# Random
  - *inventar* ve forme tabulky jako ve wowku, bez omezeni, itemy stejne at se neomezene stackuji na sebe
  - kazdy typ itemu at ma vlastni ikonu, jednoduchou, border jako rarity ve wowku, procesor: `zeleny 4.` `modre 3.` `fialove 2.` `oranzove 1.` napriklad
  po kliknuti na item ať se zobrazí modal s informacemi o itemu
  - handlovani itemu se bude delat vzdy na specificke strance, tj. trh, crafting, vyzkum whatever
  - inventar at je jako collections v GW2, rodeleni tabulek:
    - radku a sloupcu podle typu se domluvime. (jsou videt vzdy vsechny itemy, co nemas je zasedle, logicky usporadane)
  - penize nebudeme generovat jakkoliv, budou slouzit jen za ucelem vymeny mezi hraci, hlavnim zdrojem at jsou ty vouchery, penize **NESMI ZMIZET**
  vouchery budou generovat suroviny podle outputu z testingu
  - jsou dva zdroje prijmu, vouchery jsou pro hrace vzdy pseudonahodne, protoze jsou generovany v urcitem pomeru, ale neni jeste ktere dostane
  na konci dne nebo v urcitem intervalu vsichni dostanou nejaky balicek.
  - pro kazdy den se vygeneruje o trochu vic voucheru nez bude potreba aby se pokryly nejake zmeny, na konci dne se hodnoty surovin neredeemnutych voucheru sectou, vydeli poctem ucastniku a da se to do care packagu na konci dne.
  - na voucherech budes mit ruzny pocet typu surovin:
    - kazde surovine bude prirazen index nejaky, napr. pro `zlato 20`, `kremik 8`, `zelezo 3`, kazdy voucher musi mit celkovou hodnotu souctu napriklad 100, takze se namicha voucher typu zlato 2x, kremik 6x, zelezo 4x (dohromady 2*20+8*6+3*4). Zaroven se vsak taha z nejakeho poolu surovin pro den, ktery nesmi byt prekonan, tj. kdyz pro den dojde zlato, tak se to vyplni kremikem nebo zelezem, zase aby byla celkova hodnota 100.

# Pocitani vykonu
  Zatim je to tak, ze vykon (procesor + grafika + zbytek) musi byt mensi nez zdroj, jinak komp nejede a vykon = min(CPU,GPU)*2*RAM*Storage a deska musi byt z odpovidajiciho tieru CPU a GPU
  - CPU a GPU budou mit hodnoty podle vykonu, nejak rozdelene podle tieru @ArcanumSK
  - RAM od 1GB do 16GB ... od 25% do 100%
  - Storage
   - HDD nekolik tieru (wd green, blue bleck caviar?) od 75% do 100%
   - SSD od 64GB do 1TB ... od 100% do 150%
  - PSU hodnoty podle cpu a gpu

    hodnoty CPU a GPU dame takove, aby po nasobeni nevychazeli desetinna cisla

    Do databaze se ukladaji 25 nasobky zobrazovaneho cisla, aby byli cela

    RAM: Pocita se pouze celkova velikost ram, pokud je velikost >= treshold (napad na lepsi slovo?) nasobise se vykon odpovidajicimy procenty

    Storage: obdobne jako RAM

    | % | RAM GB | HDD tier | SSD GB |
    |---|---|---|---|
    | 0 | 0 | - | - |
    | 20 | 1 | 1 | - |
    | 40 | 2 | 2 | - |
    | 60 | 4 | 3 | - |
    | 80 | 6 | 4 | - |
    | 100 | 8 | - | 64 |
    | 120 | 12 | - | 128 |
    | 140 | 16 | - | 256 |
    | 160 | 24 | - | 512 |
    | 180 | 32 | - | 1024 |
    | 200 | 64 | - | 2048 |

# Možnosti obchodování
    * [ ] Vytváření nabídky
      * [x] Vybrat co se nakupuje/prodává
      * [x] Cena
      * [x] Po kolika kusech se prodává
      * [ ] Omezení kolik se toho celkově má prodat
      * [x] Věci na trhu se odečtou z vlastnictví, aby se s nimi nedalo delat nic jineho
      * [x] Když někdo něco koupí/prodá, tak se to prodejci/zakaznikovy odecte/pricte (penize i surovina)
      * [ ] při kliknutí na koupit/prodat se zobrazí dialog s potvrzením, příp. dotazem na množství #18
