-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 11:38 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `email`, `password`, `level`) VALUES
(1, 'Rifqi Ardhian', 'rifqiiardhian', 'rifqiardhian@gmail.com', '83c9c36fcc0b177e01d6182b2583bb30', 1),
(3, 'admininfo', 'admininfo', 'info@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3),
(4, 'bimasakti', 'tarunalaut', 'bimademarta10@gmail.com', '71a4d4cd2f30b185d707718273b17d05', 2),
(5, 'Robbi Pratama', 'robbimp', 'robbimeidyansyah@gmail.com', '0192023a7bbd73250516f069df18b500', 2),
(6, 'adminantrian', 'adminantrian', 'antrian@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2);

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id` int(11) NOT NULL,
  `no_antrian` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id`, `no_antrian`, `tanggal`, `id_user`, `id_dokter`, `status`) VALUES
(1, 1, '2020-05-13', 1, 2, 'success'),
(2, 2, '2020-05-13', 3, 2, 'success'),
(5, 1, '2020-05-14', 1, 6, 'success'),
(7, 1, '2020-05-14', 1, 7, 'success'),
(8, 1, '2020-05-13', 5, 6, 'success'),
(9, 1, '2020-05-13', 5, 8, 'success'),
(10, 1, '2020-05-11', 5, 5, 'success'),
(11, 1, '2020-05-16', 1, 5, 'success'),
(12, 3, '2020-05-13', 6, 2, 'success'),
(13, 2, '2020-05-16', 7, 5, 'success'),
(14, 4, '2020-05-13', 7, 2, 'success'),
(15, 1, '2020-05-15', 7, 2, 'success'),
(16, 1, '2020-05-18', 8, 8, 'success');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gelar_depan` varchar(50) DEFAULT NULL,
  `gelar_belakang` varchar(100) DEFAULT NULL,
  `gender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `id_poli`, `foto`, `nama`, `gelar_depan`, `gelar_belakang`, `gender`) VALUES
(1, 1, 'assets/foto_obat/user (3).png', 'Muhammad Rifqi Ardhian', 'dr', NULL, 0),
(2, 9, 'assets/foto_obat/user (3).png', 'Bima Demarta Aisy', 'dr', 'Sp.KJ', 0),
(3, 2, 'assets/foto_obat/orang5.jpg', 'Kelvin Irawan', 'drg', 'Sp.KG', 0),
(4, 2, 'assets/foto_obat/user (3).png', 'Beathris Anjasari', 'dr', NULL, 1),
(5, 4, 'assets/foto_obat/user (3).png', 'Arianti Lestari', 'dr', 'Sp.GK, M.Gizi', 1),
(6, 5, 'assets/foto_obat/user (3).png', 'Kevin Pradipta', 'dr', 'Sp.B', 0),
(7, 6, 'assets/foto_obat/user (3).png', 'Robbi M', 'dr', 'Sp.OT', 0),
(8, 7, 'assets/foto_obat/user (3).png', 'Bayu Novantio', 'dr', 'Sp.U', 0),
(9, 8, 'assets/foto_obat/user (3).png', 'Cosetha Aberoa', 'dr', 'Sp.BS', 0),
(10, 10, 'assets/foto_obat/user (3).png', 'Rafii Hammam', 'dr', 'Sp.P', 0),
(11, 11, 'assets/foto_obat/orang3.jpg', 'M Faruq', 'dr', 'Sp.THT', 0),
(12, 12, 'assets/foto_obat/user (3).png', 'Firhan Azmi', 'dr', 'Sp.JP', 0),
(13, 13, 'assets/foto_obat/user (3).png', 'Millenia Sylvianthie', 'dr', 'Sp.M', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `hari` int(11) NOT NULL,
  `jam` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_dokter`, `hari`, `jam`) VALUES
(1, 1, 1, '19.00'),
(2, 3, 2, '10.00'),
(3, 4, 1, '12.00'),
(4, 6, 4, '08.00'),
(5, 7, 4, '19.00'),
(6, 8, 5, '16.00'),
(7, 9, 2, '19.00'),
(8, 2, 3, '20.00'),
(9, 10, 5, '12.00'),
(10, 11, 3, '15.00'),
(11, 12, 3, '09.00'),
(12, 13, 4, '07.00'),
(13, 5, 6, '19.00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_penyakit`
--

CREATE TABLE `kategori_penyakit` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_penyakit`
--

INSERT INTO `kategori_penyakit` (`id`, `nama`) VALUES
(2, 'Kanker'),
(3, 'Jantung'),
(4, 'Virus'),
(5, 'Mata'),
(6, 'Otak'),
(7, 'Psikologi'),
(8, 'Defisiensi'),
(9, 'Infeksi'),
(10, 'Pencernaan');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kegunaan` text NOT NULL,
  `dosis` text NOT NULL,
  `efek_samping` text NOT NULL,
  `peringatan` text NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama`, `foto`, `kegunaan`, `dosis`, `efek_samping`, `peringatan`, `keterangan`) VALUES
(4, 'Panadol Paracetamol', 'assets/foto_obat/1782.jpg', 'Meredakan sakit kepala, gigi, otot nyeri, dan menurunkan demam', 'Dewasa dan anak usia lebih dari 12 tahun : 1 - 2 kaplet, 3-4 kali sehari (Maksimum 8 kaplet dalam 24 jam). Anak-anak usia 6-11 tahun : 1/2 - 1 kaplet, 3-4 kali sehari (maksimum 4 kaplet dalam 24 jam). Tidak dianjurkan penggunaan pada anak kurang dari 6 tahun. Minimum interval penggunaan dosis adalah 4 jam. Jangan melebihi dosis yang dianjurkan, atau menurut aturan dokter.', 'Tinja yang berdarah atau hitam, dan lembek, urin berdarah atau gelap, demam dengan atau tanpa menggigil (bukan timbul sebelum pengobatan dan tidak disebabkan oleh penyakit yang sedang diobati), nyeri di punggung belakang bawah/samping (parah/atau menusuk), dan bintik-bintik merah pada kulit', 'Bila rasa sakit bertahan lebih dari 3 hari, dan demam tidak menurun selama 2 hari, atau bila ada kemerahan pada kulit, segera hubungi dokter. Penggunaan dosis tinggi dapat menyebabkan kerusakan hati. Hati-hati pemberian obat ini pada penderita penyakit ginjal. Penggunaan obat ini pada penderita yang mengkonsumsi alkohol dapat meningkatkan resiko kerusakan fungsi hati. Tidak dianjurkan penggunaan secara bersamaan dengan obat lain yang mengandung paracetamol.', 'PANADOL merupakan obat dengan kandungan Paracetamol 500 mg. Obat ini dapat digunakan untuk meredakan sakit kepala, sakit gigi, sakit pada otot, nyeri yang mengganggu dan menurunkan demam yang menyertai flu/influensa dan demam sesudah vaksinasi. Panadol bekerja pada pusat pengatur suhu di hipotalamus untuk menurunkan suhu tubuh (antipiretik) serta menghambat sintesis prostaglandin sehingga dapat mengurangi nyeri ringan sampai sedang.'),
(5, 'Proris Ibuprofen', 'assets/foto_obat/proris.jpg', 'Meredakan demam, nyeri pada sakit gigi, sakit kepala, nyeri otot, nyeri pada paska operasi cabut gigi', 'Dewasa : 3-4 kali/hari, 2 sendok takar Anak-anak,untuk menurunkan demam dan meringankan nyeri. Dosis yang direkomendasikan 20 mg/kg berat badan/hari dalam dosis terbagi : 1-2 tahun : 3-4 kali/hari 1/2 sendok takar (50 mg) 3-7 tahun : 3-4 kali/hari, 1 sendok makan (100 mg) 8-12 tahun : 3-4 kali/hari, 2 sendok takar (200 mg)', 'Sakit kepala, gelisah, diare, muntah darah, hematuria, penglihatan kabur, ruam kulit, gatal, bengkak, dan meningkatkan risiko tekanan darah tinggi atau hipertensi, serangan jantung, dan stroke bila digunakan terus menurus dan dosis lebih tinggi.', 'Hati-hati pemberian pada penderita tukak lambung atau mempunyai riwayat tukak lambung dan penderita payah jantung, gangguan fungsi ginjal, hipertensi.', 'PRORIS SIRUP merupakan obat dengan kandungan Ibuprofen 100 mg tiap 5 ml. Obat ini digunakan untuk menurunkan demam, meredakan nyeri ringan sampai sedang, dan sakit kepala.'),
(6, 'Promag', 'assets/foto_obat/promag.jpg', 'Mengatasi gejala sakit maag', 'Dewasa : 3-4 x sehari 1-2 tablet. Anak-anak 6 - 12 tahun : 3 - 4 x per hari 0.5 - 1 tablet.', 'Diare, mual, reaksi alergi obat seperti timbul ruam, kulit kemerahan, gatal, bengkak pada wajah, serta sesak, dehidrasi, perubahan denyut jantung, lemas, dan pusing.', 'Gangguan fungsi ginjal, tidak dianjurkan untuk anak dibawah 6 tahun. Tidak dianjurkan untuk digunakan terus menerus selama 2 minggu, kecuali atas petunjuk dokter', 'PROMAG merupakan obat dengan kandungan Hydrotalcite, Mg(OH)2, Simethicone dalam bentuk tablet. Obat ini digunakan untuk mengurangi gejala-gejala yang berhubungan dengan: kelebihan asam lambung, gastritis, tukak lambung, tukak usus 12 jari. Gejala seperti mual, nyeri lambung, nyeri ulu hati, kembung dan perasaan penuh pada lambung.'),
(7, 'Ventolin Inhaler', 'assets/foto_obat/ventolin.jpg', 'INFORMASI OBAT INI HANYA UNTUK KALANGAN MEDIS. Meredakan serangan atau pencegahan asma ringan, sedang atau berat', 'PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER. Dewasa : - Menghilangkan bronkospam akut : 100 atau 200 mcg - Pencegahan alergen atau bronkospasme akibat olahraga : 200 mcg - Terapi kronis : 200 mcg, 4 kali/hari Anak-anak : - Menghilangkan bronkospam akut : 100 mcg - Pencegahan alergen atau bronkospame akibat olahraga : 100 mcg - Terapi kronis : 200 mcg, 4 kali/hari', 'Sakit kepala, pusing, gangguan tidur atau insomnia, nyeri pada otot, hidung yang meler atau tersumbat, mulut, dan tenggorokan terasa kering.', 'HARUS DENGAN RESEP DOKTER. Thyrotoxicosis, hypokalemia. Ibu hamil dan menyusui. Kategori kehamilan : A', 'VENTOLIN INHALER merupakan obat dengan kandungan Salbutamol yang digunakan untuk mengobati penyakit pada saluran pernafasan seperti asma dan penyakit paru obstruktif kronik (PPOK). Obat ini bekerja dengan cara merangsang secara selektif reseptor beta-2 adrenergik terutama pada otot bronkus. hal ini menyebabkan terjadinya bronkodilatasi karena otot bronkus mengalami relaksasi. Dalam penggunaan obat ini harus SESUAI DENGAN PETUNJUK DOKTER.'),
(8, 'Omeprazole', 'assets/foto_obat/omeprazole.jpg', 'INFORMASI OBAT INI HANYA UNTUK KALANGAN MEDIS. Pengobatan jangka pendek untuk tukak duodenal, tukak lambung, refluks esofagitis, sindrom Zollinger-Ellison', 'PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER. Dewasa : 1 kali sehari 1 tablet (20 - 40 mg per hari selama 2-4 minggu).', 'Demam, gejala flu seperti hidung tersumbat, bersin-bersin, sakit tenggorokan, sakit perut, buang angin, mual, muntah, diare ringan, sakit kepala.', 'HARUS DENGAN RESEP DOKTER. - Penderita dengan gangguan fungsi ginjal. - Wanita hamil, menyusui dan anak- anak usia kurang dari 1 tahun.', 'OMEPRAZOLE merupakan obat golongan proton pump inhibitor yang dgunakan untuk menurunkan produksi asam berlebih pada lambung. Obat ini sering digunakan untuk mengatasi tukak pada lambung dan usus, serta reflux esofagitis. Dalam penggunaan obat ini harus SESUAI DENGAN PETUNJUK DOKTER.'),
(9, 'Cendo Lyteers', 'assets/foto_obat/cendo.jpg', 'Melumasi dan menyejukan pada mata kering akibat kekurangan sekresi air mata atau teriritasi kondisi lingkungan, ketidaknyamanan karena penggunaan hard contact lens, gangguan penglihatan karena kelebihan lendir pada mata.', 'Teteskan pada masing- masing mata 1-2 tetes, 3 -4 kali sehari.', 'Gatal, kemerahan, bengkak, nyeri, dan sensasi hangat atau panas pada mata.', 'Jangan dipergunakan 30 hari setelah dibuka.', 'CENDO LYTEERS merupakan obat tetes mata yang mengandung Sodium Chloride dan Potassium Chloride. Obat ini digunakan untuk melumasi serta menyejukkan pada mata kering akibat kekurangan sekresi air mata atau teriritasi karena kondisi lingkungan, penggunaan contact lens, dan terdapat lendir berlebih pada mata.'),
(10, 'Metformin', 'assets/foto_obat/metformin.jpg', 'INFORMASI OBAT INI HANYA UNTUK KALANGAN MEDIS. Pasien NIDDM dan kelebihan BB yang kadar gula darahnya tidak dapat dikendalikan hanya dengan diet saja.', 'PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER. Awal: 500 mg 3 kali sehari, maksimal penggunaan 3 g/hari', 'Nyeri otot atau merasa lemas, mati rasa atau perasaan dingin di tangan dan kaki, kesulitan bernapas, merasa pusing, kepala berputar, lelah, sangat lemas, sakit perut, dan mual disertai muntah.', 'HARUS DENGAN RESEP DOKTER. Gangguan hati atau ginjal. Hamil dan laktasi. Dapat mengganggu absorpsi vit-B12. Kategori Kehamilan : B', 'METFORMIN 500 MG merupakan obat antidiabetes yang dapat menurunkan kadar gula darah pada penderita diabetes tipe 2. Obat ini dapat dikonsumsi secara tunggal, dikombinasikan dengan obat antidiabetes lain, atau diberikan bersama insulin. Dalam penggunaan obat ini harus SESUAI DENGAN PETUNJUK DOKTER.'),
(11, 'Folamil Genio', 'assets/foto_obat/folamil.jpg', 'Multivitamin dan mineral selama masa kehamilan dan masa menyusui yang mengandung DHA untuk nutrisi otak.', 'Wanita hamil dan menyusui: 1 kapsul lunak per hari setelah makan.', 'Tidak ada efek samping khusus yang ditimbulkan selama mengonsumsi folamin genio, akan tetapi suplemen ini tidak baik jika dikonsumsi oleh ibu hamil dan ibu menyusui yang sensitif terhadap satu atau lebih kandungan didalamnya. Sekalipun menimbulkan efek samping, masalah serius yang bisa dialami adalah feses berwarna hitam. Tidak semua orang mengalami efek samping selama mengonsumsi suplemen ini.', 'Wanita hamil dan menyusui sebaiknya menghindari menggunakan FOLAMIL GENIO pada dosis yang lebih tinggi dari pada dosis yang disarankan. Vitamin D sebaiknya tidak digunakan pada pasien dengan hypercalcemia dan toksisitas vitamin D. Suplemen copper sebaiknya tidak digunakan pada pasien dengan penyakit Wilson (hepatolenticular degeneration), suatu penyakit akibat akurnulasi copper yang tidak normal, sedangkan pasien dengan gagal hati kronik dan gagal ginjal kronik sebaiknya sangat berhati-hati pada penggunaan suplemen copper. Suplemen calcium sebaiknya tidak digunakan pada pasien dengan hypercalcemia (kondisi yang dapat menyebabkan hypercalcemia termasuk sarcoidosis, hyperparathyroidism, hipervitaminosis D dan kanker). Suplemen besi sebaiknya tidak digunakan pada pasien dengan kelebihan zat besi, polyarthritis kronik, asma bronkial, keluhan infeksi ginjal pada fase akut, hyperparathyroidism yang tidak terkontrol, sirosis hati yang tidak terkompensasi, infeksi hepatitis, dan selama trisemester pertama kehamilan. Betacarotene sebaiknya digunakan dengan hati-hati pada pasien dengan gangguan fungsi ginjal atau hati karena keamanan penggunaan obat ini pada kondisi-kondisi tersebut belum ada. Absorpsi riboflavin meningkat pada hypothyroidism dan menurun pada hyperthyroidism. Vitamin B12 sebaiknya tidak digunakan pada pasien Leber\'s optic atrophy (kelainan kongenital yang berhubungan dengan intoksikasi cyanide kronik (misalnya dari asap rokok). Penurunan kadar vitamin B12 diasosiasikan dengan penurunan kemampuan untuk mendetoksifikasi cyanide pada individu yang terpapar dan vitamin B12 meningkatkan risiko kerusakan saraf irreversible dari atropi optik pada pasien yang terkena gangguan tersebut.', 'FOLAMIL GENIO 30 KAPSUL merupakan suplemen yang mengandung multivitamin dan mineral yang digunakan untuk memenuhi kebutuhan nutrisi selama kehamilan dan menyusui.'),
(12, 'Amoxicillin', 'assets/foto_obat/amoxicillin.jpg', 'INFORMASI OBAT INI HANYA UNTUK KALANGAN MEDIS. Infeksi saluran napas, saluran genito-urinaria, kulit & jaringan lunak yang disebabkan organisme Gram positif & Gram Negatif yang peka terhadap Amoxicillin', 'PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER. Dewasa 250 sampai 500 mg tiap 8 jam. Anak 20 mg/kgBB/hari terbagi tiap 8 jam. Infeksi berat diberikan dosis ganda. Jika akut diberikan dalam 2 sampai 3 g dosis tunggal.', 'Diare, sakit perut, mual, sakit kepala, pusing, kesulitan tidur, dan\r\nVagina gatal atau keluar cairan keputihan.', 'HARUS DENGAN RESEP DOKTER. Alergi terhadap Penisilin atau Sefalosporin, gangguan ginjal, leukemia limfatik, ibu hamil dan menyusui. Kategori Kehamilan : B', 'AMOXICILLIN merupakan obat antibiotik generik turunan Penisilin dengan aktivitas antibakteri spektrum luas. Obat ini bersifat bakterisid yang efektif terhadap bakteri Gram negatif dan Gram positif seperti Staphylococci, Streptococci, Enterococci, S. pneumoniae, N. gonorrhoeae, H influenzas, E. coli, dan P. mirabiis. Dalam penggunaan obat ini harus SESUAI DENGAN PETUNJUK DOKTER.'),
(13, 'Bioplacenton', 'assets/foto_obat/bioplacenton.jfif', 'INFORMASI OBAT INI HANYA UNTUK KALANGAN MEDIS. Luka bakar, luka dengan infeksi, serta luka kronik dan jenis luka yang lain', 'PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER. Oleskan 4-6 x sehari atau sesuai kebutuhan pada area luka.', 'Efek samping obat bioplacenton tentunya ada bagi pasien atau konsumen yang memiliki hipersensitivitas atau alergi terhadap kandungan obat bioplacenton. Para konsumen atau calon pasien yang alergi atau hipersentif terhadap ekstrak plasenta dan atau neomisin sulfat akan memiliki efek samping berupa tanda-tanda alergi.', 'HARUS DENGAN RESEP DOKTER. Hentikan penggunaan jika terjadi sensitisasi. Penggunaan neomycin sulfate untuk periode yang lama dapat menyebabkan infeksi sekunder (misalnya infeksi jamur). Jangan gunakan BIOPLACENTON pada mata atau kulit di sekitar mata. Obat ini hanya digunakan selama kehamilan atau menyusui jika benar-benar dibutuhkan.', 'BIOPLACENTON merupakan obat yang mengandung Placenta Extract dan Neomycin sulfate. Obat ini biasa digunakan untuk mengobati luka bakar, luka dengan infeksi, serta luka kronik dan jenis luka yang lain. Ekstrak plasenta bekerja dengan memicu pembentukan jaringan baru dan untuk wound healing, sedangkan neomycin bekerja dengan mencegah atau mengatasi infeksi bakteri Gram negatif pada area luka. Dalam penggunaan obat ini harus SESUAI DENGAN PETUNJUK DOKTER.'),
(14, 'Mefinal', 'assets/foto_obat/mefinal.jpg', 'INFORMASI OBAT INI HANYA UNTUK KALANGAN MEDIS. Obat ini digunakan untuk meredakan nyeri ringan hingga sedang seperti sakit kepala, sakit gigi, nyeri haid, nyeri akibat trauma, nyeri pada otot dan nyeri sesudah operasi', 'PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER. Dosis dewasa dan anak usia lebih dari 14 tahun : Dosis awal 500 mg, kemudian dilanjutkan 250 mg tiap 6 jam, sesuai dengan kebutuhan.', 'Mual, mulas atau sakit perut, diare, sembelit, kembung, pusing, sakit kepala, gugup, kulit terasa gatal, mulut kering, berkeringat, ingusan, pandangan kabur, dan dengung di telinga.', 'HARUS DENGAN RESEP DOKTER. Pasien dengan gangguan atau faktor resiko kardiovaskular, gangguan hati dan ginjal, ibu hamil dan menyusui. Kategori Kehamilan : C', 'MEFINAL 500 MG merupakan obat dengan kandungan Asam Mefenamat yang termasuk dalam golongan anti infalamasi non steroid sebagai anti nyeri pada tingkat ringan hingga sedang. Obat ini dapat digunakan untuk meredakan sakit kepala, sakit gigi, nyeri haid, nyeri akibat trauma, nyeri pada otot dan nyeri sesudah operasi. Asam mefenamat bekerja dengan cara menghambat sintesa prostaglandin dalam jaringan tubuh dengan menghambat enzim siklooksigenase. Dalam penggunaan obat ini harus SESUAI DENGAN PETUNJUK DOKTER.'),
(16, 'Harnal Ocas', 'assets/foto_obat/harnal.jpg', 'INFORMASI OBAT INI HANYA UNTUK KALANGAN MEDIS. Lesi di kulit primer dan sekunder yang disebabkan oleh Staphylococci, seperti pada abses , furunkulosis, impetigo, folikulitis dan hidradenitis', 'PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER. 1 x sehari 0.5-1 tablet', 'Sakit kepala, rhinitis, gangguan ejakulasi, pusing, nyeri sendi, infeksi, dan hipotensi atau tekanan darah rendah', 'HARUS DENGAN RESEP DOKTER. Hipotensi ortostatik. Gangguan fungsi hati, gangguan fungsi ginjal ringan s/d sedang. Intra-op floppy iris syndrome (IFIS). Dapat mengganggu kemampuan mengemudi kendaraan bermotor atau menjalankan mesin. Usia lanjut.', 'HARNAL OCAS 0.4 MG merupakan obat untuk mengatasi masalah buang air kecil di alami oleh pria dengan pembesaran prostat dan masalah sulit buang air kecil tersendat-sendat sehingga memberikan rasa tidak nyaman. Harnal D mengandung Tamsulosin termasuk golongan alpha blocker, obat yang umumnya digunakan para pria untuk mengobati gejala pembesaran prostat (benign prostatic hyperplasia-BPH). Dalam penggunaan obat ini harus SESUAI DENGAN PETUNJUK DOKTER.'),
(17, 'Tremenza', 'assets/foto_obat/tremenza.jpg', 'INFORMASI OBAT INI HANYA UNTUK KALANGAN MEDIS. Obat ini digunakan untuk meringankan gejala-gejala flu karena alergi pada saluran pernafasan bagian atas yang memerlukan dekongestan nasal dan antihistamin', 'PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER. Dosis dewasa : 1 tablet, 3-4 kali sehari. Anak 6 - 12 tahun : 1/2 tablet, 3-4 kali sehari.', 'Mulut, hidung, tenggorokan terasa kering, menyababkan kantuk, sakit kepala, tremor, dan gangguan kecemasan, gelisah, halusinasi.', 'HARUS DENGAN RESEP DOKTER. Hati-hati bila mengendarai kendaraan bermotor atau menjalankan mesin. Pemberian pada wanita hamil dan menyusui harus sesuai petunjuk dokter. Jangan melebihi dosis yang dianjurkan. Bila gejala belum hilang atau timbul demam dalam waktu 2 hari, konsultasikan pada dokter. Tidak dianjurkan untuk anak dibawah 2 tahun kecuali atas petunjuk dokter. Hentikan penggunaan obat bila terjadi sukar tidur, jantung berdebar-debar atau pusing. Selama minum obat ini, jangan minum minuman yang mengandung alkohol, obat penenang dan obat lain yang menyebabkan rasa kantuk.', 'TREMENZA merupakan obat dengan kandungan Pseudoephedrine HCl dan Triprolidine HCl. Obat ini digunakan untuk meringankan gejala-gejala flu karena alergi pada saluran pernafasan bagian atas yang memerlukan dekongestan nasal dan antihistamin. Pseudoefedrin dalam obat ini bekerja pada reseptor alfa-adrenergik dalam mukosa saluran pernafasan sehingga menghasilkan vasokonstriksi. Triprolidin dalam obat ini merupakan suatu antihistamin yang bekerja sebagai antagonis reseptor histamin H1 dalam pengobatan alergi. Dalam penggunaan obat ini harus SESUAI DENGAN PETUNJUK DOKTER.'),
(18, 'Sanmol Forte', 'assets/foto_obat/sanmol.jpg', 'Obat ini digunakan untuk meringankan rasa sakit pada keadaan sakit kepala, sakit gigi dan menurunkan demam.', 'Dewasa dan anak usia 12 tahun ke atas: 2-2½ sendok takar (10-12.5 ml) sebanyak 3-4 kali per hari. Anak-anak 9-12 tahun: 1-2 sendok takar (5-10 ml) sebanyak 3-4 kali per hari.', 'Mual, nyeri perut, nafsu makan berkurang, warna urin gelap, dan Kulit menguning.', 'Hati-hati penggunaan obat ini pada pasien penderita gangguan fungsi ginjal. Bila setelah 2 hari demam tidak menurun atau setelah 5 hari nyeri tidak menghilang, segera hubungi Unit Pelayanan Kesehatan. Penggunaan obat ini pada penderita yang mengkonsumsi alkohol, dapat meningkatkan risiko kerusakan fungsi hati.', 'SANMOL FORTE SIRUP merupakan obat dengan kandungan Paracetamol. Obat ini digunakan untuk meringankan rasa sakit pada keadaan sakit kepala, sakit gigi dan menurunkan demam. Sanmol bekerja sebagai analgesik dengan meningkatkan ambang rasa sakit serta sebagai antipiretik yang diduga bekerja langsung pada pusat pengatur panas di hipotalamus.'),
(19, 'Dexamethasone', 'assets/foto_obat/dexa.jpg', 'INFORMASI OBAT INI HANYA UNTUK KALANGAN MEDIS. Obat ini digunakan untuk mengatasi peradangan (anti inflamasi), rheumatik arthritis, alergi dermatitis, rhinitis alergi', 'PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER. Dewasa awal bervariasi : 0.75 - 9 mg per hari, 2-4 kali sehari atau tergantung berat ringannya penyakit. Pada penyakit ringan, dosis kurang dari 0.75 mg. Pada penyakit berat, dosis lebih dari 9 mg.', 'Nafsu makan meningkat, berat badan bertambah, perubahan siklus menstruasi, gangguan tidur, pusing, dan sakit kepala.', 'HARUS DENGAN RESEP DOKTER. Tidak dianjurkan pada wanita hamil trimester pertama. Tidak dianjurkan pemakaian pada ibu menyusui. Pemakaian jangka panjang dapat menurunkan daya tahan tubuh terhadap penyakit infeksi. Tidak dianjurkan pada anak usia di bawah 6 tahun. Pemakaian pada penderita hipotiroid dan sirosis dapat meningkatkan efek obat. Hati-hati penggunaan obat ini pada penderita diabetes melitus, karena dapat meningkatkan glukoneogenesis dan mengurangi sensitifitas terhadap insulin. Kategori Kehamilan : C', 'DEXAMETHASONE 0.5 MG KAPLET adalah obat generik yang mengandung Dexamethasone 0.5 mg. Dexamethasone adalah salah obat anti inflamasi golongan kortikosteroid yang berperan dalam mengurangi atau menekan proses peradangan dan alergi yang terjadi pada tubuh. Pada tingkat molekular, diduga glukokortikoid mempengaruhi sintesa protein pada proses transkripsi RNA. Obat ini digunakan untuk meredakan peradangan dan reaksi alergi berupa gatal-gatal di kulit, dermatitis, asma bronkhial, dan sebagainya. Dalam penggunaan obat ini harus SESUAI DENGAN PETUNJUK DOKTER.'),
(20, 'Aloclair Plus Spray', 'assets/foto_obat/aloclair.jfif', 'Membantu mengatasi stomatitis aftosa dan tukak pada rongga mulut, lesi kecil pada mulut termasuk lesi traumatik yang disebabkan oleh kawat gigi dan gigi palsu; tukak aftosa difus.', 'Semprotkan 3 kali sehari atau sesuai kebutuhan pada area yang sakit.', 'Penggunaan Aloclair Plus relatif aman dan hingga kini belum ditemukan efek samping dari penggunaannya. Apabila Anda mengalami efek samping tertentu seperti reaksi alergi atau gejala efek samping lainnya, segera hentikan penggunaan obat ini.', 'Sebaiknya tidak di berikan pada anak-anak yang belum bisa berkumur, meskipun cukup aman di telan tetapi sebaiknya hindari menelan obat ini.', 'ALOCLAIR PLUS merupakan obat pereda nyeri yang bekerja secara cepat dan membantu penyembuhan pada ulkus rongga mulut. Obat ini mengandung aloe vera dan asam hialuronat.'),
(21, 'Simvastatin', 'assets/foto_obat/simvastatin.jpg', 'INFORMASI OBAT INI HANYA UNTUK KALANGAN MEDIS. Menurunkan kadar kolesterol total dan LDL pada pasien dengan hiperkolesterolemia.', 'PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER. Usia dewasa : 10 mg - 20 mg, 1 kali per hari pada malam hari. Dosis maksimal : 80 mg per hari.', 'Sakit kepala, nyeri sendi dan otot ringan, konstipasi, sakit perut atau masalah pencernaan, mual ringan,  ruam kulit ringan, dan insomnia', 'HARUS DENGAN RESEP DOKTER. Anak dan remaja. Lakukan tes kolesterol sebelum terapi dan secara periodik setelah terapi. Konsumsi alkohol, riwayat penyakit hati.', 'SIMVASTATIN merupakan obat penurun kolesterol golongan statin. Obat ini bekerja sebagai inhibitor kompetitif pada HMG-CoA reduktase (enzim yang mempercepat proses sistesis kolesterol). Hal ini dapat menurunkan kadar kolesterol total, LDL, trigliserida, dan meningkatkan kadar HDL dalam darah. Dalam penggunaan obat ini harus SESUAI DENGAN PETUNJUK DOKTER.'),
(22, 'Thrombo Aspilets', 'assets/foto_obat/thrombo.jpg', 'INFORMASI OBAT INI HANYA UNTUK KALANGAN MEDIS. Pengobatan dan pencegahan angina pektoris dan Infark Miokard.', 'PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER. 80-160 mg/hari. Untuk infark miokard : sampai dengan 300 mg/hari. Untuk TIA : sampai dengan 1000 mg/hari.', 'Iritasi lambung, mual, muntah. Pemakaian jangka panjang dapat terjadi: perdarahan lambung, dan tukak lambung.', 'HARUS DENGAN RESEP DOKTER. Gangguan fungsi hati, dispepsia, hamil dan laktasi, anak-anak. Kategori Kehamilan: C, D pada trimester ke 3.', 'THROMBO ASPILETS 80 MG TABLET adalah obat tablet yang mengandung Acetylsalicylic Acid 80 mg. Acetylsalicylic acid atau dikenal juga dengan Aspirin merupakan senyawa analgesik non steroid yang digunakan sebagai analgesik, antipiretik, antiinflamasi dan anti-platelet. Pada dosis kecil (80 mg - 100 mg), Acetylsalicylic acid, memiliki manfaat sebagai anti-platelet dengan cara menghambat pembentukan trombus pada sirkulasi arteri. Obat ini digunakan untuk mencegah agregasi platelet pada kondisi angina yang tidak stabil dan serangan iskemik otak yang terjadi sesaat. Dalam penggunaan obat ini HARUS SESUAI DENGAN PETUNJUK DOKTER.'),
(23, 'Salbutamol', 'assets/foto_obat/salbutamol.jpg', 'INFORMASI OBAT INI HANYA UNTUK KALANGAN MEDIS. Bronkospasme pada semua jenis asma bronkial, bronkritis kronik, dan emfisema', 'PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER. Dewasa : 3-4 kali sehari 1-2 tablet. Anak-anak berusia 6-12 tahun : 3 kali sehari 1 tablet. Anak berusia 2-6 tahun : 3 kali sehari 1/2 tablet.', 'Sakit kepala, sakit punggung, mual, muntah, diare, sakit perut, pusing, gugup, nyeri dada, dada berdebar, insomnia, reaksi alergi, konjungtivitis, hipokalemia, peningkatan keringat, gemetar, dan kram otot.', 'HARUS DENGAN RESEP DOKTER. Hipertiroidisme, aneurisma, diabetes melitus, glaukoma sudut tertutup. Kategori Kehamilan : C', 'SALBUTAMOL 2 MG TABLET adalah obat golongan bronkodilator. Salbutamol merupakan obat golongan beta adrenergik agonis yang secara langsung dapat membuat otot-otot polos pada bronkus menjadi lebih rileks. Selain itu, salbutamol juga dapat menurunkan kontraktilitas uterus karena efek tokolitik yang dimilikinya. SALBUTAMOL TABLET digunakan untuk mengobati bronkospasme (misalnya penyakit asma karena alergi tertentu, asma bronkial, bronkitis asmatis, emfisema pulmonum), dan penyakit paru obstruktif kronik (PPOK). Dalam penggunaan obat ini HARUS SESUAI PETUNJUK DOKTER.'),
(24, 'Rivanol Liquid', 'assets/foto_obat/85772_18-2-2019_11-37-57.jpg', 'Untuk membersihkan luka', 'Sesuai kebutuhan', 'Efek samping yang mungkin terjadi apabila menggunakan rivanol seperti Gatal-gatal, Bengkak/inflamasi, dan terbentuk ruam', 'hentikan pemakaian jika muncul reaksi yang tidak diinginkan', 'RIVANOL adalah cairan desinfektan yang di gunakan untuk membersihkan luka.'),
(25, 'Insto Reguler Eye Drops', 'assets/foto_obat/1622.jpg', 'Meredakan iritasi & kemerahan pada mata', '3-4 x sehari 2-3 tetes', 'Mata pedih, iritasi mata, mata memerah, dan terasa hangat', 'Jangan dipakai sesudah dibuka 1 bulan. Tidak boleh diberikan pada penderita glaukoma. Jangan digunakan secara rutin atau jangka panjang. Ketika digunakan, lepaskan lensa kontak', 'INSTO REGULAR EYE DROP mengandung zat aktif Tetrahidrozolin HCl dan Benzalkonium Klorida, digunakan untuk mengatasi mata merah dan rasa perih akibat iritasi mata ringan yang dapat disebabkan karena asap, debu dan lainnya.');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto_penyakit` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `penyebab` text NOT NULL,
  `gejala` text NOT NULL,
  `pengobatan` text NOT NULL,
  `pencegahan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id`, `nama`, `foto_penyakit`, `id_kategori`, `deskripsi`, `penyebab`, `gejala`, `pengobatan`, `pencegahan`) VALUES
(1, 'Hipertensi', '', 3, 'Hipertensi atau tekanan darah tinggi adalah kondisi saat tekanan darah berada pada nilai 130/80 mmHg atau lebih. Kondisi ini dapat menjadi berbahaya, karena jantung dipaksa memompa darah lebih keras ke seluruh tubuh, hingga bisa mengakibatkan timbulnya berbagai penyakit, seperti gagal ginjal, stroke, dan gagal jantung.', 'Usia, keturunan, obesitas, terlalu banyak makan makanan mengandung garam, merokok.', 'Hipertensi bisa dikatakan penyakit yang berbahaya karena dapat terjadi tanpa gejala, sehingga bisa ditemukan saat sudah muncul komplikasi. Namun gejala bisa muncul bila tekanan darah sudah sangat tinggi. Gejala yang mungkin ditimbulkan, antara lain sakit kepala, lemas, gangguan penglihatan, dada sakit.', 'Perubahan pola hidup tidak sehat, minum obat', 'Menjaga berat badan ideal, olahraga, kurangi garam, kurangi alkohol, tidak merokok. dan lain - lain'),
(2, 'Influenza', '', 4, 'Test', 'Test', 'Test', 'Test', 'Test'),
(3, 'Penyakit Jantung Koroner', '', 3, 'Penyakit jantung koroner (PJK) terjadi ketika pembuluh darah arteri yang mengalirkan darah ke jantung mengeras dan mengalami penyempitan. Kondisi ini dipicu oleh penumpukan kolesterol dan pembekuan darah di dalam arteri (aterosklerosis).\r\n\r\nPenyempitan arteri ini menyebabkan aliran darah dan oksigen ke jantung menjadi berkurang, akibatnya organ tersebut tidak dapat berfungsi normal.', 'Penumpukan kolesterol dan pembekuan darah di dalam arteri (aterosklerosis).', 'Nyeri dada, sesak napas, keringat dingin, dada berdebar, dan mual.', 'Berhenti merokok, mengurangi atau berhenti mengonsumsi alkohol, mengonsumsi makanan dengan gizi seimbang, mengurangi stress, menjaga berat badan ideal, dan berolahraga secara teratur.', 'Tidak merokok dan minum minuman keras/beralkohol, jalani pola makan sehat dengan konsumsi buah-buahan serta sayuran, dan kurangi makanan berlemak, mengontrol kadar gula dan tekanan darah dalam batas normal, dan olahraga teratur.'),
(4, 'Glaukoma', '', 5, 'Pengertian Glaukoma\r\nGlaukoma adalah jenis gangguan penglihatan yang ditandai dengan terjadinya kerusakan saraf mata. Kerusakan ini sering disebabkan oleh tekanan tinggi pada mata.', 'Penyebab glaukoma adalah meningkatnya tekanan di dalam mata (tekanan intraokular), baik akibat produksi cairan mata yang berlebihan, maupun akibat terhalangnya saluran pembuangan cairan tersebut. Tekanan ini dapat merusak serabut saraf retina, yaitu jaringan saraf yang melapisi bagian belakang mata, dan saraf optik yang menghubungkan mata ke otak. Hingga kini, belum jelas kenapa produksi cairan mata bisa berlebihan atau kenapa saluran pembuangannya bisa tersumbat.', 'Nyeri pada mata, sakit kepala, melihat bayangan lingkaran di sekeliling cahaya, mata memerah, mual atau muntah, mata berkabut (khususnya pada bayi).', 'Sayangnya, kerusakan mata yang disebabkan oleh glaukoma tidak dapat diobati atau diperbaiki kembali. Namun, pengobatan tetap perlu dilakukan untuk mengurangi tekanan intraokular pada mata dan mencegah meluasnya kerusakan pada mata. Secara umum, glaukoma bisa ditangani dengan obat tetes mata, obat-obatan yang diminum, terapi laser, serta operasi.', 'Jaga kesehatan mata sejak dini dengan konsumsi makanan yang mengandung vitamin A dan pemeriksaan kesehatan mata ke dokter secara rutin.\r\n\r\nGunakan obat tetes mata yang diresepkan dokter secara teratur. Obat tetes mata glaukoma dapat secara signifikan mengurangi risiko tekanan mata tinggi berkembang menjadi glaukoma.\r\n\r\nGunakanlah pelindung mata. Cedera mata yang serius dapat menyebabkan glaukoma. Jadi, kenakanlah pelindung mata saat berolahraga atau saat bekerja dengan menggunakan alat-alat listrik.'),
(5, 'HIV dan AIDS', '', 4, 'HIV (human immunodeficiency virus) adalah virus yang merusak sistem kekebalan tubuh, dengan menginfeksi dan menghancurkan sel CD4. Semakin banyak sel CD4 yang dihancurkan, kekebalan tubuh akan semakin lemah, sehingga rentan diserang berbagai penyakit.', 'AIDS disebabkan oleh human immunodeficiency virus (HIV). HIV yang masuk ke dalam tubuh akan menghancurkan sel CD4. Sel CD4 adalah bagian dari sel darah putih yang melawan infeksi. Semakin sedikit sel CD4 dalam tubuh, maka semakin lemah pula sistem kekebalan tubuh seseorang.\r\n\r\nPenularan HIV terjadi saat darah, sperma, atau cairan vagina dari seseorang yang terinfeksi masuk ke dalam tubuh orang lain.', 'Demam hingga menggigil, muncul ruam di kulit, muntah, nyeri pada sendi dan otot, pembengkakan kelenjar getah bening, sakit kepala, sakit perut, dan sakit tenggorokan dan sariawan.', 'Meskipun sampai saat ini belum ada obat untuk menyembuhkan HIV, namun ada jenis obat yang dapat memperlambat perkembangan virus. Jenis obat ini disebut antiretroviral (ARV). ARV bekerja dengan menghilangkan unsur yang dibutuhkan virus HIV untuk menggandakan diri, dan mencegah virus HIV menghancurkan sel CD4.', 'Gunakan kondom yang baru tiap berhubungan seks, hindari berhubungan seks dengan lebih dari satu pasangan, beri tahu pasangan bila Anda positif HIV agar pasangan Anda menjalani tes HIV, diskusikan kembali dengan dokter bila Anda didiagnosis positif HIV dalam masa kehamilan, mengenai penanganan selanjutnya dan perencanaan persalinan, untuk mencegah penularan dari ibu ke janin, bagi pria, disarankan bersunat untuk mengurangi risiko infeksi HIV.'),
(6, 'Kanker Payudara', '', 2, 'Kanker payudara adalah kondisi ketika sel kanker terbentuk di jaringan payudara. Kanker bisa terbentuk di kelenjar yang menghasilkan susu (lobulus), atau di saluran (duktus) yang membawa air susu dari kelenjar ke puting payudara. Kanker juga bisa terbentuk di jaringan lemak atau jaringan ikat di dalam payudara.', 'Kanker payudara terjadi karena sel-sel di payudara tumbuh tidak normal dan tidak terkendali. Sel-sel ini membelah dengan cepat dan berkumpul membentuk benjolan, lalu bisa menyebar ke kelenjar getah bening atau ke organ lain.\r\n\r\nBelum diketahui apa penyebab sel-sel tersebut berubah menjadi sel kanker, namun para ahli menduga adanya interaksi antara faktor genetik dengan gaya hidup, lingkungan, dan hormon, sehingga sel menjadi abnormal dan tumbuh tidak terkendali.', 'Adanya benjolan di payudara atau penebalan jaringan yang terasa berbeda dari jaringan di sekitarnya.\r\nPerubahan pada bentuk dan ukuran payudara.\r\nKulit payudara memerah.\r\nPengelupasan kulit areola dan kulit payudara.\r\nNyeri dan pembengkakan pada payudara.\r\nDarah ke luar dari puting payudara.\r\nBenjolan atau pembengkakan di bawah ketiak.', 'Bedah lumpektomi, bedah mastektomi, bedah pengangkatan kelenjar getah bening, radio terapi, terapi hormon, kemoterapi, dan terapi target', 'Rutin melakukan pemeriksaan payudara sendiri (SADARI), Rutin melakukan pemeriksaan payudara klinis (SADANIS), olahraga rutin, berhati-hati dalam melakukan terapi pengganti hormon pasca menopause, pertahankan berat badan ideal, dan hentikan konsumsi alkohol.'),
(7, 'Vertigo', '', 6, 'Vertigo adalah kondisi yang membuat penderitanya mengalami pusing, sampai merasa dirinya atau sekelilingnya berputar. Penderita dapat mengalami vertigo dengan tingkat keparahan yang berbeda-beda.', 'Berdasarkan penyebabnya, vertigo terbagi menjadi 2, yakni vertigo perifer dan sentral. Vertigo perifer adalah vertigo paling sering terjadi, yang disebabkan oleh adanya gangguan pada telinga bagian dalam. Sedangkan vertigo sentral adalah vertigo yang disebabkan karena adanya gangguan pada otak atau sistem saraf pusat.', 'Kepala tiba-tiba berat, badan seperti mau jatuh, kehilangan keseimbangan, sensasi seolah badan ditarik kencang ke suatu arah, mual parah (biasanya karena efek kepala pusing berputar-putar), muntah, gerakan bola mata yang tak wajar dan tidak bisa dikendalikan.', 'Contoh obat-obatan yang biasanya diresepkan oleh dokter untuk mengatasi vertigo adalah:\r\nAntihistamin, seperti betahistine.\r\nBenzodiazepine, seperti diazepam dan lorazepam.\r\nAnti muntah, misalnya metoclopramide.', 'Menggerakkan kepala secara perlahan dan hati-hati ketika beraktivitas, menyalakan lampu ketika terbangun di malam hari, segera duduk jika vertigo muncul, tidur dengan kepala yang sedikit terangkat atau lebih tinggi, duduk sejenak sebelum beranjak dari kasur, setelah bangun tidur, berusaha tenang ketika gejala kambuh. Rasa gelisah yang muncul dapat memperburuk kondisi.\r\nBerjongkok dan hindari membungkuk, ketika ingin mengambil barang yang ada di lantai, hindari gerakan meregangkan leher, misalnya ketika ingin melihat sesuatu melalui celah yang tinggi.'),
(8, 'Skizofrenia Paranoid', '', 7, 'Skizofrenia paranoid merupakan jenis skizofrenia yang paling umum terjadi di masyarakat. Skizofrenia sendiri merupakan penyakit gangguan otak yang menyebabkan penderitanya mengalami kelainan dalam berpikir, serta kelainan dalam merasakan atau mempersepsikan lingkungan sekitarnya. Prinsip singkatnya, penderita skizofrenia memiliki kesulitan dalam menyesuaikan pikirannya dengan realita yang ada.\r\nPada dasarnya, paranoid merupakan salah satu gejala yang dapat muncul pada penderita skizofrenia. Oleh karena itu, beberapa institusi tidak memisahkan antara skizofrenia dan skizofrenia paranoid. Meski demikian, tidak semua penderita skizofrenia mengalami paranoid.', 'Hingga saat ini penyebab munculnya skizofrenia paranoid pada seseorang belum diketahui dengan pasti. Namun diduga kelainan pada otak dan sistem transmisi saraf, serta kelainan sistem kekebalan tubuh berperan dalam menimbulkan skizofrenia.', 'Gejala utama skizofrenia paranoid adalah delusi (waham) dan halusinasi. Delusi atau waham merupakan keyakinan kuat akan suatu hal yang salah, serta hal tersebut tidak dapat dibantah oleh bukti apapun. Khusus bagi penderita skizofrenia paranoid, waham yang paling dominan muncul adalah waham kejar. Waham kejar atau persekusi pada penderita skizofrenia paranoid merupakan cerminan dari rasa takut dan kecemasan yang besar, serta cerminan dari kehilangan kemampuan untuk membedakan hal yang nyata dan tidak nyata.', 'Pengobatan skizofrenia paranoid memerlukan kombinasi dari berbagai bidang, seperti dokter, terutama psikiater, perawat, pekerja sosial, dan konselor atau terapis. Integrasi pengobatan pasien skizofrenia paranoid ini bertujuan agar pengobatan jangka panjang pasien dapat berjalan dengan baik dan sukses. Pengobatan dan perawatan pasien skizofrenia dapat dilakukan di rumah. Akan tetapi, jika gejala skizofrenia yang muncul tidak terkontrol dengan obat-obatan yang rutin dikonsumsi dan dianggap membahayakan, pasien dapat dirawat di rumah sakit.\r\n\r\nPasien umumnya diberikan obat-obatan antispikotik untuk meredakan gejala-gejala skizofrenia seperti delusi dan halusinasi. Dokter akan memantau efektivitas obat-obatan antipsikotik beserta dosisnya dalam meredakan gejala skizofrenia pada pasien. Perlu diketahui, obat antipsikotik yang diberikan tidak langsung bekerja, membutuhkan waktu sekitar 3-6 minggu untuk melihat efeknya. Terkadang, bahkan dapat mencapai 12 minggu.', 'Sampai saat ini, langkah untuk mencegah skizofrenia paranoid belum ditemukan. Namun, menghindari faktor risiko yang dapat memicu munculnya skizofrenia paranoid dapat dilakukan.'),
(9, 'Anemia Defisiensi Besi', 'assets/foto_penyakit/anemiadefisiensi.jpg', 8, 'Anemia defisiensi besi adalah satu jenis anemia yang disebabkan kekurangan zat besi sehingga terjadi penurunan jumlah sel darah merah yang sehat. Zat besi diperlukan tubuh untuk menghasilkan komponen sel darah merah yang dikenal sebagai hemoglobin. Saat tubuh mengalami anemia defisiensi besi, maka sel darah merah juga akan mengalami kekurangan pasokan hemoglobin yang berfungsi mengangkut oksigen dalam sel darah merah untuk disebarkan ke seluruh jaringan tubuh. Tanpa pasokan oksigen yang cukup dalam darah, tubuh juga tidak mendapat oksigen yang memadai sehingga dapat merasa lemas, lelah, dan sesak napas.', 'Makanan yang sedikit mengandung zat besi, masa kehamilan, pendarahan, Malabsorpsi Zat Besi.', 'Mudah lelah dan lemah, nafsu makan menurun, terutama pada bayi dan anak-anak, nyeri dada, detak jantung menjadi cepat, dan sesak napas, pucat, pusing atau pening, kaki dan tangan dingin, kesemutan pada kaki, lidah bengkak atau terasa sakit, makanan terasa aneh, telinga berdengung, kuku menjadi rapuh atau gampang patah, rambut mudah patah atau rontok, mengalami kesulitan dalam menelan (disfagia), dan luka terbuka di ujung mulut.', 'Meningkatkan asupan zat besi, mengonsumsi Suplemen Penambah Zat Besi, dan transfusi sel darah merah.', 'Kamu bisa melakukan pencegahan anemia defisiensi besi dengan mengonsumsi makanan yang mengandung zat besi setiap hari. Makanan yang kaya zat besi termasuk daging, sayuran, dan biji-bijian seperti sereal yang diperkaya zat besi.'),
(10, 'Meningitis', '', 9, 'Meningitis adalah peradangan yang terjadi pada meningen, yaitu lapisan pelindung yang menyelimuti otak dan saraf tulang belakang. Meningitis terkadang sulit dikenali, karena penyakit ini memiliki gejala awal yang serupa dengan flu, seperti demam dan sakit kepala.', 'Meningitis paling sering disebabkan oleh infeksi bakteri atau virus yang dimulai dari bagian lain pada tubuh Anda, seperti telinga, sinus, dan tenggorokan. Penyebab lain termasuk bakteri, jamur, parasit, bahan kimia, obat-obatan, dan tumor.', 'Demam tinggi, leher kaku, sakit kepala berat, kejang, sensitif terhadap cahaya, mual atau muntah, sulit berkonsentrasi atau kebingungan, ruam, nafsu makan berkurang,', 'Pada kondisi tertentu, meningitis yang disebabkan oleh virus dapat pulih dengan sendirinya. Namun, jika kondisi meningitis yang disebabkan oleh virus tergolong parah, dokter mungkin akan meresepkan obat golongan antiviral, seperti acyclovir. Pada meningitis yang disebabkan oleh bakteri, pengobatan yang dilakukan dapat berupa pemberian antibiotik atau kortikosteroid. Meningitis yang disebabkan oleh jamur diatasi dengan obat antijamur, seperti amphotericin B atau fluconazole.', 'Cuci tangan dengan benar tiap kali beraktivitas, jaga jarak dengan orang yang terinfeksi, gunakan masker jika sedang sakit, rutin berolahraga, jangan berbagi makanan atau barang pribadi, pilih makanan yang telah dipasteurisasi, menghindari asap rokok, dan istirahat yang cukup,'),
(11, 'Hipermetropi', '', 5, 'Rabun dekat atau hipermetropi adalah gangguan penglihatan jarak dekat. Pada penderita hipermetropi, objek yang jauh terlihat jelas, tetapi objek yang dekat justru terlihat tidak jelas atau buram.', 'Hipermetropi terjadi akibat cahaya yang masuk ke mata tidak terfokus ke tempat yang semestinya (retina), tetapi terfokus ke belakangnya. Hal ini disebabkan oleh bola mata yang terlalu pendek, atau bentuk kornea maupun lensa mata yang tidak normal.', 'Penglihatan tidak fokus ketika melihat objek yang dekat, harus menyipitkan mata untuk melihat sesuatu lebih jelas, mata terasa tegang, sakit atau terbakar\r\nMata lelah atau sakit kepala usai melihat pada jarak dekat dalam waktu lama, misalnya menulis, membaca atau menggunakan komputer.', 'Penggunaan kacamata atau lensa kontak, operasi laser, dan merawat kesehatan mata seperti memeriksakan mata secara rutin, mengonsumsi makanan bernutrisi, menggunakan penerangan yang baik, dan lain-lain.', 'Menggunakan penerangan yang baik, hindari menatap matahari secara langsung, periksakan mata secara rutin, dan menggunakan kacamata yang tepat.'),
(12, 'Batu Empedu', '', 10, 'Penyakit batu empedu atau cholelithiasis adalah kondisi yang ditandai dengan sakit perut mendadak akibat terbentuknya batu di dalam kantung empedu. Penyakit batu empedu juga bisa terjadi di saluran empedu.', 'Penyebab batu empedu atau cholelithiasis belum diketahui secara pasti. Namun, tingginya kadar kolesterol dan bilirubin di dalam kantung empedu diduga menjadi penyebab utama terbentuknya batu empedu.\r\n\r\nKondisi ini terjadi akibat cairan empedu tidak dapat melarutkan kelebihan kolesterol dan bilirubin yang dihasilkan oleh hati, sehingga terjadi pengendapan di dalam kantung empedu. Seiring waktu, endapan kolesterol dan bilirubin tersebut menjadi serpihan kristal yang kemudian membentuk batu empedu.', 'Batu empedu atau kolelitiasis umumnya tidak menimbulkan gejala. Namun, gejala dapat muncul ketika batu empedu menyebabkan saluran empedu tersumbat. Gejala utama penyakit batu empedu adalah nyeri di bagian kanan atas atau tengah perut dan dapat menyebar ke bagian tubuh lain, seperti bahu dan tulang belikat.\r\n\r\nSakit perut ini muncul secara tiba-tiba dan dapat berlangsung selama beberapa menit hingga beberapa jam. Nyeri dapat muncul atau menghilang tanpa dipengaruhi kondisi apa pun.', 'Melakukan operasi Kolesistektomi laparoskopi dan Kolesistektomi terbuka, dan mengkonsumsi obat-obatan yang telah diberi dokter', 'Cara terbaik untuk mencegah batu empedu atau kolelitiasis adalah dengan menerapkan pola makan sehat dan seimbang. Konsumsilah makanan tinggi serat dan perbanyak konsumsi cairan, setidaknya 6-8 gelas per hari. Makan dengan porsi kecil namun rutin juga membantu tubuh lebih mudah mencerna makanan.\r\n\r\nAnda juga dianjurkan untuk menghindari atau membatasi konsumsi beberapa jenis makanan, terutama makanan dengan kadar lemak jenuh tinggi.'),
(13, 'Wasir (Hemoroid)', '', 10, 'Wasir atau hemoroid adalah pembengkakan atau pembesaran dari pembuluh darah di usus besar bagian akhir (rektum), serta dubur atau anus. Wasir merupakan penyakit yang dapat menyerang segala usia, namun umumnya lebih sering menimbulkan keluhan pada usia 50 tahun atau lebih.', 'Penyebab sebenarnya dari wasir atau hemoroid masih belum jelas. Namun, diduga ada kaitan kuat dengan meningkatnya tekanan dalam aliran darah di dalam atau di sekitar anus. Tekanan inilah yang menyebabkan pembuluh darah pada anus membengkak dan mengalami peradangan.', 'Mengalami gatal atau iritasi, sakit, merah dan bengkak di sekitar anus, benjolan yang posisinya menggantung di luar anus, terasa nyeri dan sensitif bila terkena sentuhan. Benjolan bisa terdorong masuk kembali ke dalam anus setelah BAB, perdarahan setelah BAB tanpa rasa nyeri, yang ditandai dengan darah berwarna merah terang yang menetes dari dubur, kotoran keluar dengan sendirinya dari lubang anus, dan keluarnya lendir setelah BAB.', 'Perubahan pola makan dan perilaku buang air besar, obat oles yang bisa dibeli secara bebas, pemakaian krim kortikosteroid, obat pereda nyeri, dan obat pencahar atau laksatif.', 'Mengonsumsi makanan yang kaya akan serat, Minum banyak cairan, Jangan mengejan berlebihan, jangan menunda BAB, Hindari duduk terlalu lama, dan hindari mengangkat benda berat.'),
(14, 'Tumor Otak', '', 6, 'Tumor otak adalah penyakit yang timbul akibat tumbuhnya jaringan abnormal di otak. Tergantung jenisnya, tumor otak ada yang bersifat jinak maupun ganas.', 'umor otak ada yang berasal dari jaringan otak sendiri (tumor otak primer), ada juga yang berasal dari tumor pada organ lain yang menyebar ke otak (tumor otak sekunder).\r\n\r\nTumor otak primer terjadi akibat perubahan genetik pada sel di jaringan otak, yang menyebabkan sel tersebut tumbuh tanpa terkendali. Penyebab perubahan genetik ini sendiri belum diketahui dengan pasti. Sedangkan tumor otak sekunder, terjadi akibat adanya sel kanker dari bagian tubuh lain yang menyebar (metastasis) ke jaringan otak.', 'Kehilangan fungsi koordinasi, seperti kesulitan berjalan dan mengendalikan gerakan, kesulitan berbicara, dan mata berkedip terus menerus, gangguan fungsi panca indera, seperti gangguan penglihatan dan kehilangan fungsi, otot wajah mengalami kelumpuhan, disfagia, tubuh terasa lemas atau mengalami mati rasa.', 'Radioterapi, kemoterapi, Operasi pengangkatan tumor, dan pemulihan', 'Membatasi Radiasi. Radiasi diklaim merupakan salah satu faktor utama pemicu dari kanker otak, mencukupi Istirahat dan Hindari Stres, jaga Pola Makan Sehat, melakukan Pemeriksaan Kesehatan Secara Teratur.'),
(15, 'Hepatitis A', '', 4, 'Hepatitis A adalah peradangan organ hati yang disebabkan oleh infeksi virus hepatitis A. Infeksi yang akan mengganggu kerja organ hati ini dapat menular dengan mudah, melalui makanan atau minuman yang terkontaminasi virus.', 'Hepatitis A disebabkan oleh virus hepatitis A, yang dapat menyebar dengan mudah. Penularan hepatitis A terjadi melalui makanan atau minuman yang telah terkontaminasi oleh tinja penderita hepatitis A. Hal ini bisa terjadi karena kebersihan diri dan lingkungan yang tidak terjaga.', 'Urine berwarna gelap seperti teh, tinja berwarna pucat seperti dempul, lemas, mual dan muntah, nyeri perut bagian atas, tidak nafsu makan, berat badan menurun, kulit terasa gatal,', 'Pengobatan hepatitis A hanya bertujuan untuk meredakan gejala yang dirasakan. Obat antivirus tidak dibutuhkan karena virus hepatitis A akan dibasmi oleh sistem kekebalan tubuh penderita sendiri.', 'Selalu mencuci tangan dengan air mengalir dan sabun, terutama sebelum makan, sebelum mengolah makanan, dan setelah dari toilet, tidak berbagi penggunaan barang-barang pribadi, seperti sikat gigi atau handuk, termasuk juga peralatan makan, selalu memasak makanan sampai matang dan merebus air sampai mendidih, hindari jajan di pedagang kaki lima yang kebersihannya kurang terjaga.');

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id`, `nama`) VALUES
(1, 'Umum'),
(2, 'Gigi'),
(3, 'Kesehatan Ibu & Anak'),
(4, 'Gizi'),
(5, 'Bedah Umum'),
(6, 'Bedah Ortopedi'),
(7, 'Bedah Urologi'),
(8, 'Bedah Saraf'),
(9, 'Jiwa'),
(10, 'Paru'),
(11, 'THT'),
(12, 'Jantung'),
(13, 'Mata');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nim`, `nama_depan`, `nama_belakang`, `email`, `password`) VALUES
(1, '183140914111021', 'Rifqi', 'Ardhian', 'rifqiiardhian@gmail.com', 'rifqi@1310'),
(2, '193140914111021', 'Putri', 'Larasati', 'palipulepol@gmail.com', '25112000'),
(5, '183140914111009', 'Robbi', 'Pratama', 'robbimeidyansyah@gmail.com', '12345'),
(6, '183140914111023', 'Bayu', 'Novantio', 'bayu@gmail.com', '12345'),
(7, '1111111111', 'hi', 'hi', 'hihi@hihi.com', 'hihihi'),
(8, '1841170057', 'Azzmi', 'S', 'azzmis98@gmail.com', '25062000');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_jadwal_poli`
-- (See below for the actual view)
--
CREATE TABLE `v_jadwal_poli` (
`id` int(11)
,`nama_dokter` varchar(100)
,`gelar_depan` varchar(50)
,`gelar_belakang` varchar(100)
,`gender` int(11)
,`poli` varchar(100)
,`hari` int(11)
,`jam` varchar(10)
);

-- --------------------------------------------------------

--
-- Structure for view `v_jadwal_poli`
--
DROP TABLE IF EXISTS `v_jadwal_poli`;

CREATE ALGORITHM=UNDEFINED DEFINER=`rifqiiar`@`localhost` SQL SECURITY DEFINER VIEW `v_jadwal_poli`  AS  select `d`.`id` AS `id`,`d`.`nama` AS `nama_dokter`,`d`.`gelar_depan` AS `gelar_depan`,`d`.`gelar_belakang` AS `gelar_belakang`,`d`.`gender` AS `gender`,`p`.`nama` AS `poli`,`j`.`hari` AS `hari`,`j`.`jam` AS `jam` from ((`dokter` `d` join `poli` `p` on((`d`.`id_poli` = `p`.`id`))) join `jadwal` `j` on((`d`.`id` = `j`.`id_dokter`))) order by `d`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_penyakit`
--
ALTER TABLE `kategori_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kategori_penyakit`
--
ALTER TABLE `kategori_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
