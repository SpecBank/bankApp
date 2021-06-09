-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Cze 2021, 09:51
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `specbank`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `apitoken`
--

CREATE TABLE `apitoken` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `hardware` varchar(255) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cards`
--

CREATE TABLE `cards` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `nr_karty` varchar(16) DEFAULT NULL,
  `data_waznosci` varchar(255) DEFAULT NULL,
  `cvf` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `forget`
--

CREATE TABLE `forget` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `kod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `loginlog`
--

CREATE TABLE `loginlog` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `adres_ip` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `loginlog`
--

INSERT INTO `loginlog` (`ID`, `user_ID`, `data`, `token`, `adres_ip`) VALUES
(1, 1, '2021-03-14 17:34:47', 'CGY1Q1fRYo1C1eM1UXIH6EeTKwyZmMBVBzcrJmM85RkEpISSlwtj2Fqbl3aRgyrv', '::1'),
(2, 1, '2021-03-14 17:35:17', 'sNW9X0BRjP33I3DsBaGzoidOGanFkEqPcEPay9z8DRQiWlPibkBcbGjjNo7JqWjk', '::1'),
(3, 1, '2021-03-17 18:06:23', 'QYAZqWlNfsDRYYHDj6RGcto80XOz5Qi8BajjJY1E5AvHFnih6TwGCyrl8affFnq8', '::1'),
(4, 1, '2021-03-17 18:07:08', 'ySjDJzdzoMrwrxwqReXfnOvDVUEE3Jutt6Wya4ossVJcse6q18vydwRt2ltil5BO', '::1'),
(5, 1, '2021-03-17 18:08:15', 'SDcaRhDuTGTyHcOa3HjyPKxA99eQCGYToK61XATWOmLn2mlTFxWg8uxagYqbayhw', '::1'),
(6, 1, '2021-03-17 18:10:00', 'Fd9VXHU4KVpUSrbafiq13OIrzqHlhci5aAMjmy9aHT8lf8mSq6Pgx5gLC9VdhLI7', '::1'),
(7, 1, '2021-03-17 21:51:39', 'ngI253FhwP6dW2qTxQPl16nOI6u1wyrN5ZbOfZAmOgnOqpkPFoWBen8KQwHFGsO0', '::1'),
(8, 1, '2021-03-17 21:53:42', 'gOOtqcSQElsXZp5cGpKjccHuukiJ8MYSws6dinyjPZhVfoVGHsPYCx3jauOjvfa2', '::1'),
(9, 1, '2021-03-17 21:54:07', '9yBZzfFMu9YF6ZY01nrIhuB86fvWwornuGuhu9wI5OBq2YJPtrsvFk8e03OZxCs7', '::1'),
(10, 1, '2021-03-17 22:50:03', 'zdS7Sb6EP7m0l3rcUNbazSEiFUlEzMh8dLrQFn0JSDtwSdXFHGBcLnCjZJrTEC8Q', '::1'),
(11, 1, '2021-03-17 22:52:41', 'IkBgymOeeMMTw9h3DjWqcKuWRbSoAvXULCL2B7ZkAWiK13hZ9BoTQmxzIJsnivHO', '::1'),
(12, 1, '2021-03-29 21:10:26', 'vJrARCo8fQqUBN1Iw5tuNsY2neP8eO61ONrz1TNLcSrdo1bRflMZPM5eLzHpiDNn', '::1'),
(13, 1, '2021-04-18 17:45:27', 'c2UAhPuHPVe1augd2BBe5mANumEWAEw5V2x8vQ1Fapn9pXng9rarVJ3sF5tf3RZv', '::1'),
(14, 1, '2021-04-18 17:57:34', 'vFG7Wfmg8O8XaE1zeLaipi2bdzZYTTklT4Rd3frFYbwoCIyoH7cXK5DnUNwMt1rN', '::1'),
(15, 1, '2021-04-18 18:08:07', 'lFtfL1mSeFQ2VjxTOZPqRrQoUt6Ue39zzLMr4FUVV7h4yujwbaFk93cge7WWCix9', '::1'),
(16, 1, '2021-04-18 18:55:49', 'iYonxb92gjJmQYv0ECMAqVCzty8h3HFuuDIeFNL6giq0Op3nVnSA7pzc4YxT58lv', '::1'),
(17, 1, '2021-04-24 20:30:26', 'bprHgg3BotEUQIEa504tPXRmAbktCmcbRZWvrdIkJb11JlZJhATeBFtytULdD4RX', '::1'),
(18, 1, '2021-04-25 11:18:02', 'xnSWRtYmu3CFrEBetDYkg9muA2pthQUN4eozHE78RRSNWghpS2Z8ZaZ5wrm1yXI8', '::1'),
(19, 1, '2021-04-25 11:51:53', 'oyIkYtFRYBU5DYRgZtbo4IyAZ5J4iwbZ0hpP5Or1abq9PXUOyW5uoclgaK0r7gf0', '::1'),
(20, 1, '2021-04-28 16:06:16', 'uVL3uWUy6uUOVrrfNSMcL3zjsgVMbwk8688RCBhqw2VrvhKSlBFdfZNmUA9Knu59', '::1'),
(21, 1, '2021-05-09 09:35:51', '4eq5CrNj730LGt21GPyL6QxbZbFyrGQdxpCTJ48GEvE6q5AXISxYET7pWOZvUExM', '::1'),
(22, 1, '2021-05-10 10:13:19', 'NvmkdAKMBkwIuh3ZjCSJNjnJU7ViaTHexcsKWiyeN2OsWvnjtUylsRq6jKYqdy7v', '::1'),
(23, 1, '2021-05-12 21:24:00', 'dUFWCoh3w7AwH21m6m8ORPBg1kdpdgsHt0jXlyMUjukiSivtAdZWHqVp3uEks5nx', '::1'),
(24, 1, '2021-05-13 11:25:05', 'BtWsHQ3ooETl5WbYyvkBarikGoKe8skTqSRyBZzFonF0GD58lJLKV8O0EJ9fOrl8', '::1'),
(25, 1, '2021-05-13 13:21:02', 'F3ZZ7tlZDwZxSKlNeGQjoTFNji7FboCMTt7vJVjnbV6Kn2ErCiYBa0O7tpg1z9Gz', '::1'),
(26, 1, '2021-05-13 13:34:13', '3NQIHCv5KtFGRo9id6SCRWoaieY90cBjLN13aT2CePCir30lrn69vcRquBy8YhoQ', '::1'),
(28, 1, '2021-05-13 13:41:20', 'RQIOdXuJruWidmt5y4ich5l6riJyc6QabpwHXMvEwBJfIKaZhR2irej8RirWo3d4', '::1'),
(29, 1, '2021-05-13 16:31:00', 'aLdFlOk4TeasY8KuIh2xT2p5V9PVSmMqS3wZl0sSEb6RidXs9djpN1JNuKEdcAuA', '::1'),
(30, 1, '2021-05-25 11:33:30', 'dDRao7pOygtHusOHdso6CXMfLZLqfyyfFsrI0ruPCSGUfNgo00QT1mNuVmRgqTlL', '::1'),
(31, 1, '2021-05-25 11:46:40', 'Uz6PRTYFlifdwJFI7yu070m7rb7lnwYHHZectbOzZm2x2WlxqWaSQTwNtst2yxlG', '::1'),
(32, 1, '2021-06-02 21:48:36', 'TWu77yNJK22QMaRlwaAzrXe35SGY7IjeNPmm9S9AblWURdOsz6oKRT51qVZhxYNG', '::1'),
(33, 1, '2021-06-05 11:52:28', 'jn28zvvsi5nFUURythPPJsI8Mgx8lBgdRUNNgRz3y2xjdYZ4NBF6Clln6AsZDLzv', '::1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `saldo`
--

CREATE TABLE `saldo` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `saldo` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `saldo`
--

INSERT INTO `saldo` (`ID`, `user_ID`, `saldo`) VALUES
(1, 1, 3099303234),
(2, 2, 40027);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transactions`
--

CREATE TABLE `transactions` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `typ_transakcji` varchar(128) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `opis` varchar(512) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `kwota` int(11) DEFAULT NULL,
  `cel_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `transactions`
--

INSERT INTO `transactions` (`ID`, `user_ID`, `typ_transakcji`, `opis`, `data`, `kwota`, `cel_ID`) VALUES
(1, 1, 'Przelew wychodzący', 'PRZELEW', '2021-05-12 21:27:32', 100, 2),
(2, 2, 'Przelew przychodzący', 'PRZELEW', '2021-05-12 21:27:32', 100, 1),
(3, 1, 'Przelew wychodzący', 'PRZELEW', '2021-05-13 11:38:10', 300, 2),
(4, 2, 'Przelew przychodzący', 'PRZELEW', '2021-05-13 11:38:10', 300, 1),
(5, 1, 'Przelew wychodzący', 'Wyrównanie konta', '2021-05-13 11:39:11', 9069, 2),
(6, 2, 'Przelew przychodzący', 'Wyrównanie konta', '2021-05-13 11:39:11', 9069, 1),
(7, 1, 'Przelew wychodzący', 'Przelewam 1 grosz', '2021-05-13 13:35:14', 1, 2),
(8, 2, 'Przelew przychodzący', 'Przelewam 1 grosz', '2021-05-13 13:35:14', 1, 1),
(9, 1, 'Przelew wychodzący', 'HAHA', '2021-05-13 16:32:10', 69, 2),
(10, 2, 'Przelew przychodzący', 'HAHA', '2021-05-13 16:32:10', 69, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `imie` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `nazwisko` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `adres` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `data_urodzenia` varchar(255) DEFAULT NULL,
  `nr_telefonu` varchar(12) DEFAULT NULL,
  `nr_banku` varchar(26) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `haslo` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID`, `imie`, `nazwisko`, `adres`, `data_urodzenia`, `nr_telefonu`, `nr_banku`, `email`, `haslo`, `login`) VALUES
(1, 'Jakub', 'Wiśniewski', 'Golenice 166/6', '04.09.2003', '+48123456789', '12345678901234567890123456', 'kubaczak@kubaczak.com', '$2y$10$afZgSnmPVoSF.cpKDWCkgOrNc6KGiKrsbvchyzRkaWdHMkKtato9m', 'kubaczak'),
(2, 'TEST', 'TESTW', 'TEST', '01.01.1990', '123123123', '12345678901234567890123455', 'test@test.test', 'test', 'test');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `apitoken`
--
ALTER TABLE `apitoken`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `forget`
--
ALTER TABLE `forget`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `loginlog`
--
ALTER TABLE `loginlog`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `apitoken`
--
ALTER TABLE `apitoken`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `cards`
--
ALTER TABLE `cards`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `forget`
--
ALTER TABLE `forget`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `loginlog`
--
ALTER TABLE `loginlog`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT dla tabeli `saldo`
--
ALTER TABLE `saldo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `transactions`
--
ALTER TABLE `transactions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
