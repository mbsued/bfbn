                document.addEventListener('DOMContentLoaded', function () {
                    const form = document.forms.suche;
                    const schulartCtrl = new SchulartController(form.schulart);
                    const jahrgangsstufeCtrl = new JahrgangsstufeController(form.jahrgangsstufe, schulartCtrl);
                    const ausbildungsrichtungCtrl = new AusbildungsrichtungController(form.ausbildungsrichtung, jahrgangsstufeCtrl);
                    ausbildungsrichtungCtrl.addEventListener("change", ausbildungsrichtungChanged)
                    schulartCtrl.mapData(data)
                });
                // SelectionController ist eine abstrakte Basisklasse für die konkreten Controller, die 
                // zur Anbindung der select Elemente dienen
                // Abstrakte Methoden sind
                // getValue(key) - muss das Datenobjekt liefern, das zu einer ausgewählten option gehört.
                // Als key wird der Wert des value-Attributs dieser Option übergeben.
                // getValueList(dataSource) - muss Daten für die option-Elemente liefern, die im select 
                // Element einzutragen sind. Ergebnis muss ein Array aus Objekten sein, jedes Objekt muss
                // die Properties value (für das value-Attribut) und text (für den Inhalt des option Elements)
                // enthalten
                class SelectionController extends EventTarget {
                    constructor(selectElement, parentNode = null) {
                            super(); // Pflicht: Konstruktor der Superklasse aufrufen
                            if (!(selectElement instanceof HTMLSelectElement)) {
                                throw new Error(
                                    "Controller-Objekt benötigt ein select Element als ersten Parameter");
                            }
                            if (parentNode && !(parentNode instanceof SelectionController)) {
                                throw new Error(
                                    "Controller-Objekt benötigt einen SelectionController als zweiten Parameter"
                                );
                            }
                            this.selectElement = selectElement;
                            this.parentNode = parentNode;
                            this.selectElement.addEventListener("change", event => this._handleChangeEvent(
                                event))
                            if (parentNode) {
                                parentNode.addEventListener("change", event => this.mapData(event.selectedObject));
                            }
                        }
                        // Ordnet dem select Element eine Datenquelle zu. 
                        // dataSource ist ein Objekt, aus dem die getValueList die Daten für die
                        // select-Optionen ermitteln kann, oder null, um das select-Element zu
                        // disablen
                    mapData(dataSource) {
                            // Quelldaten-Objekt im Controller speichern.
                            this.dataSource = dataSource;
                            // Optionen nur anfassen, wenn eine getValueList Methode vorhanden ist.
                            //  Andernfalls davon ausgehen, dass die options durch das HTML
                            // bereitgestellt werden.
                            if (typeof this.getValueList == "function") {
                                // Existierende Optionen entfernen
                                removeOptions(this.selectElement);
                                // Wenn dataSource nicht null war, die neuen Optionen daraus beschaffen
                                // Andernfalls das select-Element deaktivieren
                                const options = dataSource && this.getValueList(dataSource);
                                if (!options || !options.length) {
                                    setToDisabled(this.selectElement)
                                } else {
                                    setToEnabled(this.selectElement, options);
                                }
                            }
                            // Zum Abschluss ein change-Event auf dem select-Element feuern, damit
                            // jeder weiß, dass hier etwas passiert ist
                            this.selectElement.dispatchEvent(new Event("change"));
                            // Helper: Entferne alle options aus einem select Element	
                            function removeOptions(selectElement) {
                                    while (selectElement.length > 0) selectElement.remove(0);
                                }
                                // Helper: select-Element auf disabled setzen und eine Dummy-Option 
                                // eintragen. Eine Variante wäre: das selectElement auf hidden setzten
                            function setToDisabled(selectElement) {
                                    addOption(selectElement, "", "------");
                                    selectElement.disabled = true;
                                }
                                // Helper: disabled-Zustand vom select-Element entfernen und die
                                // übergebenen Optionen eintragen. Vorweg eine Dummy-Option "Bitte wählen".
                            function setToEnabled(selectElement, options) {
                                    addOption(selectElement, "", "Bitte auswählen ...");
                                    for (var optionData of options) {
                                        addOption(selectElement, optionData.value, optionData.text);
                                    }
                                    selectElement.disabled = false;
                                }
                                // Helper: Option-Element erzeugen, ausfüllen und im select-Element eintragen
                            function addOption(selectElement, value, text) {
                                let option = document.createElement("option");
                                option.value = value;
                                option.text = text
                                selectElement.add(option);
                            }
                        }
                        // Abstrakte Methode! Wird sie nicht überschrieben, wird der TypeError geworfen
                    getValue(key) {
                            throw new TypeError(
                                "Die abstrakte Methode 'getValue' wurde nicht implementiert!");
                        }
                        // Stellt den im select Element ausgewählten Optionswert zur Verfügung
                    get selectedKey() {
                            return this.selectElement.value;
                        }
                        // Liefert das Datenobjekt zum ausgewählten Optionswert
                    get selectedObject() {
                            return this.dataSource ? this.getValue(this.dataSource, this.selectElement.value) :
                                null;
                        }
                        // privat
                        // Die Methode reagiert auf das change-Event des select-Elements
                        // und stellt es als eigenes change-Event des Controllers zur Verfügung
                    _handleChangeEvent(event) {
                        let nodeChangeEvent = new Event("change");
                        nodeChangeEvent.selectedObject = this.selectedObject;
                        this.dispatchEvent(nodeChangeEvent);
                    }
                }
                class SchulartController extends SelectionController {
                    constructor(selectElement) {
                        super(selectElement, null);
                    }
                    getValue(quelle, schulartId) {
                        return quelle.find(schulart => schulart.id == schulartId);
                    }
                }
                class JahrgangsstufeController extends SelectionController {
                    constructor(selectElement, parentController) {
                        super(selectElement, parentController);
                    }
                    getValueList(schulart) {
                        return schulart.jahrgangsstufe.map(jahrgangsstufe => ({
                            value: jahrgangsstufe.id,
                            text: jahrgangsstufe.name
                        }));
                    }
                    getValue(schulart, jahrgangsstufeId) {
                        return schulart.jahrgangsstufe.find(jahrgangsstufe => jahrgangsstufe.id ==
                            jahrgangsstufeId);
                    }
                }
                class AusbildungsrichtungController extends SelectionController {
                    constructor(selectElement, parentController) {
                        super(selectElement, parentController);
                    }
                    getValueList(jahrgangsstufe) {
                        return jahrgangsstufe.ausbildungsrichtung.map(ausbildungsrichtung => ({
                            value: ausbildungsrichtung.id,
                            text: ausbildungsrichtung.name
                        }));
                    }
                    getValue(jahrgangsstufe, ausbildungsrichtungId) {
                        return jahrgangsstufe.ausbildungsrichtung.find(ausbildungsrichtung => ausbildungsrichtung.id == ausbildungsrichtungId);
                    }
                }
            }
            var data = [
                {
                    id: "1",
                    name: "Fachoberschule",
                    jahrgangsstufe: [
                        {
                            id: "1",
                            name: "11. Jahrgangsstufe",
                            ausbildungsrichtung: [
                                {
                                    id: "1",
                                    name: "Agrarwirtschaft, Bio- und Umwelttechnologie"
                                },
                                {
                                    id: "2",
                                    name: "Gestaltung"
                                },
                                {
                                    id: "3",
                                    name: "Gesundheit"
                                },
                                {
                                    id: "4",
                                    name: "International Wirtschaft"
                                },
                                {
                                    id: "5",
                                    name: "Sozialwesen"
                                },
                                {
                                    id: "6",
                                    name: "Technik"
                                },
                                {
                                    id: "7",
                                    name: "Wirtschaft und Verwaltung"
                                },            
                            ]
                        },
                        {
                            id: "2",
                            name: "12. Jahrgangsstufe",
                            ausbildungsrichtung: [
                                {
                                    id: "1",
                                    name: "Agrarwirtschaft, Bio- und Umwelttechnologie"
                                },
                                {
                                    id: "2",
                                    name: "Gestaltung"
                                },
                                {
                                    id: "3",
                                    name: "Gesundheit"
                                },
                                {
                                    id: "4",
                                    name: "International Wirtschaft"
                                },
                                {
                                    id: "5",
                                    name: "Sozialwesen"
                                },
                                {
                                    id: "6",
                                    name: "Technik"
                                },
                                {
                                    id: "7",
                                    name: "Wirtschaft und Verwaltung"
                                }
                            ]
                        },
                        {
                            id: "3",
                            name: "13. Jahrgangsstufe",
                            ausbildungsrichtung: [
                                {
                                    id: "1",
                                    name: "Agrarwirtschaft, Bio- und Umwelttechnologie"
                                },
                                {
                                    id: "2",
                                    name: "Gestaltung"
                                },
                                {
                                    id: "3",
                                    name: "Gesundheit"
                                },
                                {
                                    id: "4",
                                    name: "International Wirtschaft"
                                },
                                {
                                    id: "5",
                                    name: "Sozialwesen"
                                },
                                {
                                    id: "6",
                                    name: "Technik"
                                },
                                {
                                    id: "7",
                                    name: "Wirtschaft und Verwaltung"
                                }
                            ]
                        }
            		]
            	},
                {
                    id: "2",
                    name: "Berufsoberschulea",
                    jahrgangsstufe: [
                        {
                            id: "2",
                            name: "12. Jahrgangsstufe",
                            ausbildungsrichtung: [
                                {
                                    id: "1",
                                    name: "Agrarwirtschaft, Bio- und Umwelttechnologie"
                                },
                                {
                                    id: "3",
                                    name: "Gesundheit"
                                },
                                {
                                    id: "4",
                                    name: "International Wirtschaft"
                                },
                                {
                                    id: "5",
                                    name: "Sozialwesen"
                                },
                                {
                                    id: "6",
                                    name: "Technik"
                                },
                                {
                                    id: "7",
                                    name: "Wirtschaft und Verwaltung"
                                }
                            ]
                        },
                        {
                            id: "3",
                            name: "13. Jahrgangsstufe",
                            ausbildungsrichtung: [
                                {
                                    id: "1",
                                    name: "Agrarwirtschaft, Bio- und Umwelttechnologie"
                                },
                                {
                                    id: "3",
                                    name: "Gesundheit"
                                },
                                {
                                    id: "4",
                                    name: "International Wirtschaft"
                                },
                                {
                                    id: "5",
                                    name: "Sozialwesen"
                                },
                                {
                                    id: "6",
                                    name: "Technik"
                                },
                                {
                                    id: "7",
                                    name: "Wirtschaft und Verwaltung"
                                }
                            ]
                        }
            		]
                }
            ];