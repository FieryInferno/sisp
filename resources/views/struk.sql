select `struk`.`penawaran`.`BRNAME` AS `BRNAME`,`struk`.`penawaran`.`RENAME` AS `RENAME`,`struk`.`penawaran`.`POREFN` AS `POREFN`,`struk`.`penawaran`.`POTRCO` AS `POTRCO`,`struk`.`penawaran`.`PORECO` AS `PORECO`,`struk`.`penawaran`.`PODESC` AS `PODESC`,`struk`.`penawaran`.`PODTPO` AS `PODTPO`,`struk`.`penawaran`.`NOMINAL` AS `NOMINAL`,`struk`.`penawaran`.`POSTAT` AS `POSTAT`,`struk`.`lokasi`.`nama` AS `nama_lokasi`,`struk`.`lokasi`.`alamat` AS `alamat_lokasi`,`struk`.`lokasi`.`nama_pimpinan` AS `nama_pimpinan`,`struk`.`penawaran`.`PODTVL` AS `PODTVL1`,'' AS `PODTVL2`,'' AS `PODTVL3`,`struk`.`penawaran`.`POTIME` AS `POTIME`,`struk`.`users`.`nama_lengkap` AS `nama_user`,`struk`.`penawaran`.`PODTPO` AS `PODTPO`,'penawaran' AS `jenis`,`struk`.`penawaran`.`POUSER` AS `POUSER`,`struk`.`penawaran`.`OPDESC` AS `OPDESC`,`struk`.`lokasi`.`id` AS `id_lokasi` 
from (
  (
    `struk`.`penawaran`
    left join `struk`.`lokasi` on(`struk`.`penawaran`.`lokasi_id` = `struk`.`lokasi`.`id`)
  )
  left join `struk`.`users` on(`struk`.`penawaran`.`created_by` = `struk`.`users`.`id`)

union all select `struk`.`uang_muka`.`BRNAME` AS `BRNAME`,`struk`.`uang_muka`.`RENAME` AS `RENAME`,`struk`.`uang_muka`.`POREFN` AS `POREFN`,`struk`.`uang_muka`.`POTRCO` AS `POTRCO`,`struk`.`uang_muka`.`PORECO` AS `PORECO`,`struk`.`uang_muka`.`PODESC` AS `PODESC`,`struk`.`uang_muka`.`PODTPO` AS `PODTPO`,`struk`.`uang_muka`.`NOMINAL` AS `NOMINAL`,`struk`.`uang_muka`.`POSTAT` AS `POSTAT`,`struk`.`lokasi`.`nama` AS `nama_lokasi`,`struk`.`lokasi`.`alamat` AS `alamat_lokasi`,`struk`.`lokasi`.`nama_pimpinan` AS `nama_pimpinan`,`struk`.`uang_muka`.`PODTVL1` AS `PODTVL1`,`struk`.`uang_muka`.`PODTVL2` AS `PODTVL2`,`struk`.`uang_muka`.`PODTVL3` AS `PODTVL3`,`struk`.`uang_muka`.`POTIME` AS `POTIME`,`struk`.`users`.`nama_lengkap` AS `nama_user`,`struk`.`uang_muka`.`PODTPO` AS `PODTPO`,'uang_muka' AS `jenis`,`struk`.`uang_muka`.`POUSER` AS `POUSER`,`struk`.`uang_muka`.`OPDESC` AS `OPDESC`,`struk`.`lokasi`.`id` AS `id_lokasi`
from (
  (
    `struk`.`uang_muka`
    left join `struk`.`lokasi` on(`struk`.`uang_muka`.`lokasi_id` = `struk`.`lokasi`.`id`)
  )
  left join `struk`.`users` on(`struk`.`uang_muka`.`created_by` = `struk`.`users`.`id`)
)