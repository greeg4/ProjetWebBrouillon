CREATE OR REPLACE FUNCTION addClient(text,text,text,text,text)
  RETURNS integer AS
'
    declare fnom alias for $1;
    declare fpr alias for $2;
    declare fadr alias for $3;
    declare ftel alias for $4;    
    declare id integer;
    begin
        insert into Client(nomCl, prenomCl, adrCl, telCl) values (fnom, fpr, fadr, ftel);
        select into id idCl from Client where nomCl=fnom and prenomCl=fpr and adrCl=fadr and telCl=ftel;
	if not found then
	    id=0;
	end if;
	return id;
end;
'
LANGUAGE plpgsql 

