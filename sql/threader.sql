-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 24-06-04 05:32
-- 서버 버전: 10.4.32-MariaDB
-- PHP 버전: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- 데이터베이스: `threader`
--
CREATE DATABASE IF NOT EXISTS `threader` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `threader`;

-- --------------------------------------------------------

--
-- 테이블 구조 `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `thread_id` int(11) DEFAULT NULL,
  `thread_inner_id` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `comment` varchar(1000) DEFAULT NULL,
  `author_id` varchar(20) DEFAULT NULL,
  `author_display` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `comment`
--

INSERT INTO `comment` (`comment_id`, `thread_id`, `thread_inner_id`, `title`, `comment`, `author_id`, `author_display`) VALUES
(1, 1, 1, '사이트에 관한 문의/건의사항을 알려 주세요.', '사이트를 이용하면서 궁금하거나 개선이 필요해 보이는 부분들을 알려주시면 감사하겠습니다.', 'admin1', '운영자1 (admin1)'),
(2, 1, 2, '페이지가 너무 단순하게 생겼어요', '이러한 디자인과 구조는 사용자를 전혀 고려하지 않은 것 같아요.', 'user1', '유저1 (user1)'),
(3, 1, 3, '회원 정보를 수정하는 기능을 만들어 주세요.', '닉네임을 바꾸고 싶어요.', 'user2', '나는회원2 (user2)'),
(6, 1, 6, '2>> 의견 감사합니다. ', '더욱 노력하겠습니다.\r<br>죄송합니다.', 'admin1', '운영자1 (admin1)'),
(7, 1, 7, '3>> 의견 감사합니다.', '그건 확실히 필요해 보이는 기능이네요. ', 'admin1', '운영자1 (admin1)'),
(8, 2, 1, '스팀 게임 추천 부탁드립니다', 'Portal이라는 게임이 해보고 싶어서 스팀에 가입했습니다.\r<br>그런데 Portal 외에도 재미있어 보이는 게임들이 많아 보여서 하나씩 해보려 합니다. 어떤 것부터 하는 것이 좋을까요?', 'user1', '유저1 (user1)'),
(9, 2, 2, 'Half-Life 추천드립니다.', 'Portal을 개발한 Valve사에서 만든 것입니다.\r<br>Portal에 비해 퍼즐이 적고 슈팅이 강조된 작품입니다.', 'user3', '게이머1 (user3)'),
(10, 2, 3, '저는 스카이림을 재미있게 했어요', '스토리나 퀘스트 구성이 높은 자유도를 가지고 있어서 몰입이 잘 되더라구요.\r<br>단점은 전투가 조금 밋밋합니다.', 'user4', '익명'),
(11, 3, 1, '리눅스 파이썬 프로그래밍 오류?', '리눅스로 몇몇 패키지를 pip install로 설치하려 하니까\r<br>무슨 메시지가 뜨면서 설치가 안 됩니다...\r<br>apt install로 대신 설치하라는데 apt 목록에도 안보이고요...\r<br>도움 부탁드립니다', NULL, '익명'),
(12, 1, 8, '운영자 ㅎㅇ', 'ㅁㄴㅇㄹ', NULL, '익명'),
(13, 3, 2, '파이썬 가상 환경을 사용하시면 됩니다.', '프로젝트의 경로에서 python -m venv 명령어를 통하여 가상환경을 생성한 뒤에\r<br>그곳에서 pip install 하시면 정상적으로 설치 될 것입니다.', 'user5', '초보개발자 (user5)'),
(14, 4, 1, 'C#보다 JAVA가 높은 점유율을 가지는 이유?', 'C#과 JAVA 둘 다 공부하고 있는 학생입니다. \r<br>아무리 생각해봐도 C#이 훨씬 개발하기 편하다고 생각되는데, JAVA의 점유율에 뒤처지는 이유는 무엇인가요?', 'user5', '초보개발자 (user5)'),
(15, 4, 2, '자바를 많이 쓰고 있기 때문입니다.', '이미 자바를 이용하여 개발이 된 환경을 굳이 C#으로 바꿀 필요가 없습니다. \r<br>하지만 점점 C#을 이용하는 경우가 늘어나는 추세라서 언젠가 점유율이 뒤집힐지도 모르겠습니다.', 'user1', '유저1 (user1)'),
(16, 4, 3, '답변 감사드립니다.', '그러면 비슷한 관계인 C++과 Rust도\r<br>결국 Rust가 큰 비중을 차지하게 될까요?', 'user5', '초보개발자 (user5)'),
(17, 5, 1, '큰 주제들로 스레드를 분리해주세요', '간단하게 질문, 자유, 취미 등으로만 분리해도 난잡함이 줄어들 것 같은데요.\r<br>지금은 말 그대로 모든 주제의 스레드가 모여 있어서 복잡합니다.\r<br>\r<br>일단 큰 주제들로 분리를 한 다음, 주제에 상관 없이 모든 스레드를\r<br>볼 수 있는 페이지를 만드는 것은 어떤가요?', NULL, '익명'),
(18, 5, 2, '건의는 따로 스레드가 있으니 거기에다 하세요', 'ㅇ', NULL, '익명'),
(19, 5, 3, '2>> 죄송합니다. 있는지도 몰랐네요', '그런 중요한 것들은 페이지 최상단에\r<br>고정시켜두면 참 좋을텐데 말이죠', NULL, '익명'),
(20, 5, 4, '의견 감사드립니다.', '주제별 분리와 스레드 고정 기능 모두\r<br>현재 개발 중입니다. \r<br>사이트 이용에 불편을 드려 죄송합니다.', 'admin1', '운영자1 (admin1)'),
(21, 1, 9, '8>> 의미 없는 코멘트는 삭제될 수 있습니다.', '주의해주시길 바랍니다.', 'admin1', '운영자1 (admin1)'),
(22, 6, 1, '요즘 어떤 음악(또는 노래) 들으시는지', '저는 요즘 foo fighters의\r<br>pretender에 푹 빠져버렸더랬죠', 'user6', '지나가던사람 (user6)'),
(23, 6, 2, '류이치 사카모토 들음', '편안하게 듣기 좋음', NULL, '익명'),
(24, 6, 3, '.', '쿨 - 애상\r<br>자자 - 버스안에서\r<br>이박사 - 스페이스 판타지', 'user3', '게이머1 (user3)'),
(25, 1, 10, '회원이 되면 어떤 메리트가 있죠?', '제목이 곧 내용입니다', NULL, '익명'),
(26, 7, 1, '백트래킹과 브루트포스는 무슨 차이가 있나요', '브루트포스에서 예외처리가 들어가면 백트래킹인가요?', NULL, '익명'),
(27, 7, 2, '', '탐색할 필요가 없는 경로를 분리해내는 것은 가지치기입니다.\r<br>\r<br>브루트포스는 무차펼 대입법으로,\r<br>모든 경로를 검사하는 방법입니다.\r<br>\r<br>백트래킹은 DFS에 가지치기가 포함된 형태라고 보시면 됩니다. \r<br>깊게 경로를 탐색하다가 막히면 뒤로 돌아가서 다른 경로를 탐색하는 것이죠,', 'user4', 'user4'),
(28, 7, 3, '2>> 감사합니다. 이해가 잘 됐습니다.', '여태까지 잘못 알고 있었군요', NULL, '익명'),
(29, 8, 1, '스레드 채우기가 귀찮습니다', '한 페이지당 스레드가 10개씩은 나와야 돼서 \r<br>적어도 20+ 개는 넣어야 되지 않나 싶습니다.', NULL, '익명'),
(30, 8, 2, '인정합니다.', '인정', NULL, '익명'),
(31, 8, 3, '동의합니다.', '동의', NULL, '익명'),
(32, 8, 4, '맞습니다.', '정답', NULL, '익명'),
(34, 10, 1, '내일살거', '통 케찹, 양상치 반통, 파 두쪽\r<br>전공책, 기업은행 보안카드, 백설탕 한포대\r<br>비피더스 한묶음, 옛날통닭 두마리 현금계산으로', 'user7', 'user7'),
(35, 10, 2, '리액트 기말공부', '이벤트핸들링, 라이프사이클 함수\r<br>본교재 예제 위주로', 'user7', 'user7'),
(36, 10, 3, '데이터베이스 과제 제출', '', 'user7', 'user7'),
(37, 11, 1, '이런 사이트도 있었네요', '안녕하세요', NULL, '익명'),
(38, 1, 11, '10>> 회원의 장점에 대해', '문의 감사드립니다.\r<br>1. 작성한 스레드와 코멘트(이하 게시물)\r<br>를 삭제할 수 있습니다.\r<br>2. 작성한 게시물에 닉네임, 아이디를 선택적으로 표시할 수 있습니다.\r<br>3. 추후 자신이 작성한 게시물을 \r<br>확인할 수 있는 기능을 추가할 예정입니다.', 'admin1', '운영자1 (admin1)'),
(39, 11, 2, '익명님 반갑습니다.', '환영합니다', 'admin1', '운영자1 (admin1)'),
(40, 8, 5, '맞습니다. 그래서', '그래서 페이지당 스레드 수를 5개로 줄였습니다.', 'admin1', '운영자1 (admin1)'),
(41, 12, 1, '유니티로 완성작을 하나 만들고 싶습니다', '여태까지 잡다한 기능들을 구현해 보는 것은 자주 했습니다.\r<br>그런데 이것들을 합쳐서 완성된 게임을 만들어 본 적이 없는 것이 고민입니다.\r<br>그저 구현만 할 때에는 목표료 하는 기능이 있으니 의욕이 나지만,\r<br>게임 제작 자체를 목표로 하니 자꾸만 기획한 게임의 재미에 대해 \r<br>평가를 하게 됩니다.\r<br>때문에 내가 만들고 있는 것은 재미 없는 게임이라서, 완성할 가치가 없다고 생각하여 \r<br>갈아엎은 프로젝트가 너무 많습니다.\r<br>저는 어떻게 해야 할까요?', 'user5', '초보개발자 (user5)'),
(42, 12, 2, '그냥 Pong 같은 것부터 시작하세요.', '게임을 만드는 것이 목적이 아닌 것 같아 보입니다.\r<br>게임 개발자가 되고 싶다면 그것이 재미가 있든 없든 일단 만드세요.\r<br>이또한 공부입니다. \r<br>그럼에도 힘들 것 같다면 Pong같은 간단하여 개발 기간이 짧은 게임부터\r<br>천천히 시작해 보세요.\r<br>일단 완성이 중요합니다. 그래야 출시와 같은 완성 이후의 경험들도\r<br>해볼 수 있으니까요.', 'user4', 'user4'),
(43, 2, 4, '던그리드 추천드려요', '한국에서 개발한 로그라이트 게임인데 \r<br>게임이 간단해서 할 거 없을 때 즐기기 좋습니다', NULL, '익명'),
(44, 1, 12, '스레드 병합 기능을 만들어 주세요', '주제가 겹치는 스레드가 있을 때 이들을 병합하는 기능이 필요합니다.\r<br>이러한 기능이 없다면 스레드 방식을 이용하는 의미가 없어집니다.', 'admin2', '운영자2 (admin2)');

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `member_id` varchar(20) NOT NULL,
  `member_password` varchar(20) NOT NULL,
  `member_name` varchar(20) DEFAULT NULL,
  `permission` set('member','admin') NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`member_id`, `member_password`, `member_name`, `permission`) VALUES
('admin1', 'admin1', '운영자1', 'admin'),
('admin2', 'admin2', '운영자2', 'admin'),
('user1', 'user1', '유저1', 'member'),
('user2', 'user2', '나는회원2', 'member'),
('user3', 'user3', '게이머1', 'member'),
('user4', 'user4', NULL, 'member'),
('user5', 'user5', '초보개발자', 'member'),
('user6', 'user6', '지나가던사람', 'member'),
('user7', 'user7', NULL, 'member');

-- --------------------------------------------------------

--
-- 테이블 구조 `thread`
--

CREATE TABLE `thread` (
  `thread_id` int(11) NOT NULL,
  `comment_id_first` int(11) DEFAULT NULL,
  `comment_id_last` int(11) DEFAULT NULL,
  `next_thread_inner_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `thread`
--

INSERT INTO `thread` (`thread_id`, `comment_id_first`, `comment_id_last`, `next_thread_inner_id`) VALUES
(1, 1, 44, 13),
(2, 8, 43, 5),
(3, 11, 13, 3),
(4, 14, 16, 4),
(5, 17, 20, 5),
(6, 22, 24, 4),
(7, 26, 28, 4),
(8, 29, 40, 6),
(10, 34, 36, 4),
(11, 37, 39, 3),
(12, 41, 42, 3);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- 테이블의 인덱스 `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`thread_id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- 테이블의 AUTO_INCREMENT `thread`
--
ALTER TABLE `thread`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;
