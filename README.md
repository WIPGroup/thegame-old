Master: [![build status](https://ci.gitlab.com/projects/2263/status.png?ref=master)](https://ci.gitlab.com/projects/2263?ref=master)
# Branches
* `master` obsahuje **nejnovejsi** verzi kodu
* `latestWorking` obsahuje posledni **poradne proverenou** verzi, u ktere vse fungovalo
* `ex_(username)` personalni experimentalni branch
* dalsi branche muzete vytvaret pro pokusy a tak podobne, pokud planujete je mit dlouhodobe, doplnte jejich popis, nedelejte nazvy moc dlouhe, pak sou blbe videt v teamcity

Prístupy:
phpMyAdmin (pri každom update trh.sql manuálne importujte [autor commitu])
```
http://417rct.org/phpMyAdmin/
$user='rctorg_antre';
$passwd='F}6Z?6tX-H&E';
$databaze='rctorg_antre';
```

# Možnosti obchodování
* [ ] Vytváření nabídky
  * [x] Vybrat co se nakupuje/prodává
  * [x] Cena
  * [x] Po kolika kusech se prodává
  * [ ] Omezení kolik se toho celkově má prodat
  * [ ] Věci na trhu se odečtou z vlastnictví, aby se s nimi nedalo delat nic jineho
  * [ ] Když někdo něco koupí/prodá, tak se to prodejci/zakaznikovy odecte/pricte (penize i surovina)
  * [ ] při kliknutí na koupit/prodat se zobrazí dialog s potvrzením, příp. dotazem na množství #18

# Workflow (obsolete, needs update):
* [x] Vymyslet nazev
* [x] Pridat databazi na GH
* [ ] **Vytvaret podrony log vseho co se deje**
* [ ] Administrace
  * [ ] Pridavani tymu a jejich sprava
* [ ] Generovani kodu, ktere se pak vytisknou a budou symbolizovat ruzne veci
* [ ] Redeem techto kodu
* [ ] Stranka s prubeznymi vysledky a ruzne statisky, grafy
* [x] Trading stranka
  * [ ] Nabidka a jeji potvrzeni, odmitnuti, zmena ceny s urcitym clovekem za pevnou cenu
  * [ ] Nabidka a poptavka vsem za urcitou cenu
  * [ ] Nabidka casove omezena, na konci se proda tomu kdo nabidl nejvic
* [ ] Crafting stranka
  * [ ] Ucraftit
  * [ ] Seznam receptu