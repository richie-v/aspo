; <?PHP exit; ?>
; DO NOT REMOVE THE ABOVE!!
; or your settings will become visible

;--------------------------------------------------------------------------------
; Database configuration
;--------------------------------------------------------------------------------

host				= "localhost"
user				= "root"
password			= "Vf1mjm3A"
database			= "aspo_portal"

;--------------------------------------------------------------------------------
; General settings
;--------------------------------------------------------------------------------

;e-mail address of webmaster
webmastermail		= "webmaster@sociale-psychologie.nl"

;cron verbose: 0 = only errors, 1 = full details
cronverbose 		= 1

;number of months after which failed orders are purged. Use 0 to disable purging.
purgeorders 		= 2

;number of months after which inactive users are purged. Use 0 to disable purging.
purgeusers 			= 2

;lock packages when they are sold (1) or not (0)?
locksold			= 1

;--------------------------------------------------------------------------------
; User selection lists
;--------------------------------------------------------------------------------

;position list
positions[] = "Student"
positions[] = "Promovendus"
positions[] = "Postdoc"
positions[] = "UD"
positions[] = "UHD"
positions[] = "Hoogleraar"
positions[] = "Overig"

;diet list
diets[]	= "Vlees"
diets[]	= "vis"
diets[]	= "Vegetarisch"

;country list
countries["BG"] = "Bulgarije"
countries["CY"] = "Cyprus"
countries["DK"] = "Denemarken"
countries["DE"] = "Duitsland"
countries["EE"] = "Estland"
countries["FI"] = "Finland"
countries["FR"] = "Frankrijk"
countries["GR"] = "Griekenland"
countries["HU"] = "Hongarije"
countries["IE"] = "Ierland"
countries["IT"] = "Italië"
countries["LV"] = "Letland"
countries["LT"] = "Litouwen"
countries["LU"] = "Luxemburg"
countries["MT"] = "Malta"
countries["NL"] = "Nederland"
countries["AT"] = "Oostenrijk"
countries["PL"] = "Polen"
countries["PT"] = "Portugal"
countries["RO"] = "Roemenië"
countries["SI"] = "Slovenië"
countries["SK"] = "Slowakije"
countries["ES"] = "Spanje"
countries["CZ"] = "Tsjechië"
countries["TR"] = "Turkije"
countries["GB"] = "Verenigd Koninkrijk"
countries["US"] = "Verenigde Staten"
countries["SE"] = "Zweden"
