CREATE OR REPLACE FUNCTION verif_cnx(text, text) RETURNS integer AS
'	
        declare flogin alias for $1;
	declare fpassword alias for $2;
	declare id integer;
	declare retour integer;
begin
	select into id idadmin from admin where nomadmin=flogin and mpadmin=fpassword;
	if not found
	then
	  retour=0;
	else
	  retour=1;
	end if;
	return retour;
end;
'
LANGUAGE plpgsql;