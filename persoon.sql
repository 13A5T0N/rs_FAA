select persoon_naam, persoon_voornaam, persoon_tel, persoon_adres,richting.naam ,rol.naam
from persoon, rol, richting 
where 
persoon.richting_id = richting.richting_id
and 
persoon.rol_id  = rol.rol_id