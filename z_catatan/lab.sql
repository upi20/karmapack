-- ambil lis pengurus

select
if( ppj.parent_id is null, ppj.no_urut,
concat( (select ppj2.no_urut from pengurus_jabatans ppj2 where ppj2.id = ppj.parent_id),', ', ppj.no_urut )
)as no_urut
,ppj.nama as jabatan, u.nama
from pengurus_anggotas ppjm
	join pengurus_jabatans ppj on ppjm.jabatan_id = ppj.id
	join pengurus_periodes pp on ppj.periode_id = pp.id
	join anggotas u on ppjm.anggota_id = u.id
where
	pp.id = 2
	order by
	(select ppj2.no_urut from peng  urus_jabatans ppj2 where ppj2.id = ppj.parent_id), ppj.no_urut
